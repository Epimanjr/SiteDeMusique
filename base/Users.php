<?php

include 'Base.php';

class Users {

    /**
     * Id de l'utilisateur
     * @var type 
     */
    private $user_id;

    /**
     * Nom de l'utilisateur
     * @var type 
     */
    private $username;

    /**
     * Mot de passe de l'utilisateur
     * @var type 
     */
    private $password;

    /**
     * Email de l'utilisateur.
     * @var type 
     */
    private $email;

    /**
     * Construit un utilisateur.
     */
    public function __construct() {

    }

    /**
     * GETTER MAGIQUE 
     * 
     * @param type $attr_name
     * @return type
     */
    public function __get($attr_name) {
        if (property_exists(__CLASS__, $attr_name)) {
            return $this->$attr_name;
        }
    }

    /**
     * SETTER MAGIQUE
     * 
     * @param type $attr_name
     * @param type $attr_val
     */
    public function __set($attr_name, $attr_val) {

        if (property_exists(__CLASS__, $attr_name)) {
            $this->$attr_name = $attr_val;
        }

        //$emess = __CLASS__ . ": unknown member $attr_name (setAttr)";
    }

    /**
     * Insertion d'un nouvel utilisateur dans la base de données.
     */
    public function insert() {
        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("INSERT INTO users (user_id, username, password, email) VALUES ( :user_id, :username, :password, :email )");
        $query->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $query->bindParam(':username', $this->username, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);

        /* Exécution de la requête */
        $query->execute();

        $this->user_id = $c->lastInsertId();
    }

    /**
     * Permet de mettre à jour un utilisateur dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function update() {

        /* On test si l'ID est défini, sinon on ne peut pas faire la mise à jour */
        if (!isset($this->user_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
        }

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("update users set username= ?, password= ?, email= ? where user_id=?");
        $query->bindParam(1, $this->username, PDO::PARAM_STR);
        $query->bindParam(2, $this->password, PDO::PARAM_STR);
        $query->bindParam(3, $this->email, PDO::PARAM_STR);
        $query->bindParam(4, $this->user_id, PDO::PARAM_INT);

        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Suppression de l'utilisateur dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function delete() {
        /* On vérifie si l'id est renseigné, sinon on ne peut pas supprimer */
        if (!isset($this->user_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }

        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("DELETE FROM users where user_id=?");
        $query->bindParam(1, $this->user_id, PDO::PARAM_INT);

        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Recherche d'un utilisateur avec son ID
     * 
     * @param type $id
     * @return \Users
     */
    public static function findById($id) {
        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from users where user_id=?");
        $query->bindParam(1, $id, PDO::PARAM_INT);

        /* Exécution de la requête */
        $query->execute();

        /* Récupération du résultat */
        $d = $query->fetch(PDO::FETCH_BOTH);

        /* Création d'un Objet */
        $user = new Users();
        $user->user_id = $d['user_id'];
        $user->username = $d['username'];
        $user->password = $d['password'];
        $user->email = $d['email'];

        return $user;
    }

    /**
     * Permet de récupérer tous les utilisateurs
     * 
     * @return \Users
     */
    public static function findAll() {
        /* Création d'un tableau dans lequel on va stocker tous les utilisateurs */
        $res = array();

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from users");

        /* Exécution de la requête */
        $query->execute();

        /* Parcours du résultat */
        while ($d = $query->fetch(PDO::FETCH_BOTH)) {
            $user = new Users();

            $user->user_id = $d['user_id'];
            $user->username = $d['username'];
            $user->password = $d['password'];
            $user->email = $d['email'];
            $res[] = $user;
        }

        return $res;
    }

    /**
     * Affichage d'un utilisateur.
     */
    function afficher() {
        echo "Utilisateur " . $this->user_id . " : " . $this->username . ", email = " . $this->email . "<br/>\n";
    }
}

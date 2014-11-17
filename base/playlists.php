<?php

include 'Base.php';

class Playlists  {

    /**
     * Id de l'utilisateurt
     * @var type 
     */
    private $user_id;

    /**
     * id du playlists
     * @var type 
     */
    private $playlist_id;

    /**
     * le nom du palylists
     * @var type 
     */
    private $playlist_name;

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
     * Insertion d'un nouveau playlist dans la base de données.
     */
    public function insert() {
        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("INSERT INTO Playlists (user_id,playlist_id, playlist_name) VALUES ( :user_id, :playlist_id, :playlist_name, )");
        $query->bindParam(':user_id', $this-> user_id, PDO::PARAM_INT);
        $query->bindParam(':playlist_id', $this->playlist_id, PDO::PARAM_INT);
        $query->bindParam(':playlist_name', $this->playlist_name, PDO::PARAM_STR);
        
        /* Exécution de la requête */
        $query->execute();

        $this->playlist_id = $c->lastInsertId();
    }

     /**
     * Permet de mettre à jour un playlist dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function update() {

        /* On test si l'ID est défini, sinon on ne peut pas faire la mise à jour */
        if (!isset($this->playlist_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
        }

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("update Playlists set playlist_name= ?,user_id= ?, info= ? where playlist_id=?");
        $query->bindParam(1, $this->playlist_name, PDO::PARAM_STR);
        $query->bindParam(2, $this->user_id, PDO::PARAM_INT);
        $query->bindParam(3, $this->playlist_id, PDO::PARAM_INT);
        
        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Suppression de playlist dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function delete() {
        /* On vérifie si l'id est renseigné, sinon on ne peut pas supprimer */
        if (!isset($this->playlist_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }

        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("DELETE FROM Playlists where playlist_id=?");
        $query->bindParam(1, $this->playlist_id, PDO::PARAM_INT);

        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Recherche d'un playlist avec son ID
     * 
     * @param type $id
     * @return \playlist
     */
    public static function findById($id) {
        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from Playlists where playlist_id=?");
        $query->bindParam(1, $id, PDO::PARAM_INT);

        /* Exécution de la requête */
        $query->execute();

        /* Récupération du résultat */
        $d = $query->fetch(PDO::FETCH_BOTH);

        /* Création d'un Objet */
        $playlist = new Playlists();
        $playlist->playlist_id = $d['playlist_id'];
        $playlist->user_id = $d['user_id'];
        $playist->playlist_name = $d['playlist_name'];
       
        return $playist;
    }

    /**
     * Permet de récupérer tous les playlists
     * 
     * @return \Users
     */
    public static function findAll() {
        /* Création d'un tableau dans lequel on va stocker tous les utilisateurs */
        $res = array();

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from playlists");

        /* Exécution de la requête */
        $query->execute();

        /* Parcours du résultat */
        while ($d = $query->fetch(PDO::FETCH_BOTH)) {
            /* Création d'un Objet */
            $playlist = new Playlists();
            $playlist->playlist_id = $d['playlist_id'];
            $playlist->user_id = $d['user_id'];
            $playlist->playlist_name = $d['playlist_name'];
     
            $res[] = $playlist;
        }

        return $res;
    }

    /**
     * Affichage d'un utilisateur.
     */
    function afficher() {
        echo "Playlists " . $this->playlist_id. " : " . $this->playlist_name . "<br/>\n";
    }

}

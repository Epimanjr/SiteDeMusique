<?php

include 'Base.php';

class Artists {

    /**
     * Id de l'artiste
     * @var type 
     */
    private $artist_id;

    /**
     * Nom de l'artiste
     * @var type 
     */
    private $name;

    /**
     * URL de l'image.
     * @var type 
     */
    private $image_url;

    /**
     * Informations de l'artiste.
     * @var type 
     */
    private $info;

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
     * Insertion d'un nouvel artiste dans la base de données.
     */
    public function insert() {
        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("INSERT INTO users (artist_id, name, image_url, info) VALUES ( :artist_id, :name, :image_url, :info )");
        $query->bindParam(':artist_id', $this->artist_id, PDO::PARAM_INT);
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':image_url', $this->image_url, PDO::PARAM_STR);
        $query->bindParam(':info', $this->info, PDO::PARAM_STR);

        /* Exécution de la requête */
        $query->execute();

        $this->artist_id = $c->lastInsertId();
    }

    /**
     * Permet de mettre à jour un artiste dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function update() {

        /* On test si l'ID est défini, sinon on ne peut pas faire la mise à jour */
        if (!isset($this->artist_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
        }

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("update artists set name= ?, image_url= ?, info= ? where artist_id=?");
        $query->bindParam(1, $this->name, PDO::PARAM_STR);
        $query->bindParam(2, $this->image_url, PDO::PARAM_STR);
        $query->bindParam(3, $this->info, PDO::PARAM_STR);
        $query->bindParam(4, $this->artist_id, PDO::PARAM_INT);

        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Suppression de l'artiste dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function delete() {
        /* On vérifie si l'id est renseigné, sinon on ne peut pas supprimer */
        if (!isset($this->artist_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }

        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("DELETE FROM artists where artist_id=?");
        $query->bindParam(1, $this->artist_id, PDO::PARAM_INT);

        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Recherche d'un artiste avec son ID
     * 
     * @param type $id
     * @return \Users
     */
    public static function findById($id) {
        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from artists where artist_id=?");
        $query->bindParam(1, $id, PDO::PARAM_INT);

        /* Exécution de la requête */
        $query->execute();

        /* Récupération du résultat */
        $d = $query->fetch(PDO::FETCH_BOTH);

        /* Création d'un Objet */
        $artist = new Artists();
        $artist->artist_id = $d['artist_id'];
        $artist->name = $d['name'];
        $artist->image_url = $d['image_url'];
        $artist->info = $d['info'];

        return $artist;
    }

    /**
     * Permet de récupérer tous les artistes
     * 
     * @return \Users
     */
    public static function findAll() {
        /* Création d'un tableau dans lequel on va stocker tous les utilisateurs */
        $res = array();

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from artists");

        /* Exécution de la requête */
        $query->execute();

        /* Parcours du résultat */
        while ($d = $query->fetch(PDO::FETCH_BOTH)) {
            /* Création d'un Objet */
            $artist = new Artists();
            $artist->artist_id = $d['artist_id'];
            $artist->name = $d['name'];
            $artist->image_url = $d['image_url'];
            $artist->info = $d['info'];
            $res[] = $artist;
        }

        return $res;
    }

    /**
     * Affichage d'un utilisateur.
     */
    function afficher() {
        echo "Artiste " . $this->artist_id . " : " . $this->name . "<br/>\n";
    }

}

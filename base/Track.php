<?php

include 'Base.php';

class Track {

    private $artist_id;

    /**
     * Id de l'utilisateur
     * @var type 
     */
    private $track_id;

    /**
     * Id de  de track
     * @var type 
     */
    private $track_title;

    /**
     * titre du track
     * @var type 
     */
    private $mp3_url;

    /**
     * mp3 url
     * 
     */
    public function construct() {
        
    }

    public function __set($attr_name, $attr_val) {

        if (property_exists(__CLASS__, $attr_name)) {
            $this->$attr_name = $attr_val;


            //$emess = __CLASS__ . ": unknown member $attr_name (setAttr)";
        }
    }

    public function _set($attr_name, $attr_val) {

        if (property_exists(__CLASS__, $attr_name)) {
            $this->$attr_name = $attr_val;
        }

        //$emess = __CLASS__ . ": unknown member $attr_name (setAttr)";
    }

    public function insert() {
        /* Connexion à la base */
        $c = Base::getConnection();


        // preparation des requets
        $query = $c->prepare("INSERT INTO track (user_id, track_id, track_title, mp3_url) VALUES (:user_id , :track_id, :track_title, :mp3_url )");
        $query->bindParam(':artiste_id', $this->user_id, PDO::PARAM_INT);
        $query->bindParam(':track_id', $this->track_id, PDO::PARAM_int);
        $query->bindParam(':track_title', $this->track_title, PDO::PARAM_STR);
        $query->bindParam(':mp3_url', $this->email, PDO::PARAM_STR);

        $query->execute();

        $this->user_id = $c->lastInsertId();
    }

    public function update() {

        /* On test si l'ID est défini, sinon on ne peut pas faire la mise à jour */
        if (!isset($this->artist_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
        }
        /* Connexion à la base */
        $c = Base::getConnection();

        // préparation des requets
        $query = $c->prepare("update track set track_id= ?, track_title= ?, mp3_url= ? where artist_id=?");
        $query->bindParam(1, $this->track_id, PDO::PARAM_int);
        $query->bindParam(2, $this->track_title, PDO::PARAM_STR);
        $query->bindParam(3, $this->mp3_url, PDO::PARAM_STR);
        $query->bindParam(4, $this->artist_id, PDO::PARAM_INT);
        /* Exécution de la requête */
        return $query->execute();
    }
    /**
     * Suppression de track dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function delete() {
        /* On vérifie si l'id est renseigné, sinon on ne peut pas supprimer */
        if (!isset($this->track_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }
        
         /* Connexion à la base de données */
        $c = Base::getConnection();
        
         /* Préparation de la requête */
        $query = $c->prepare("DELETE FROM users where user_id=?");
        $query->bindParam(1, $this->track_id, PDO::PARAM_INT);

           /* Exécution de la requête */
        return $query->execute();
    }
    /**
     * Recherche d'un track avec son ID
     * 
     * @param type $id
     * @return \Users
     */
     public static function findById($id) {
        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * track where track_id=?");
        $query->bindParam(1, $id, PDO::PARAM_INT);

        /* Exécution de la requête */
        $query->execute();

        /* Récupération du résultat */
        $d = $query->fetch(PDO::FETCH_BOTH);

        /* Création d'un Objet */
        $track = new track();
         $artist->track= $d['artiste_id'];
        $track->track_id = $d['track_id'];
        $artist->track_title = $d['track_title'];
        $artist->mp3_url = $d['mp3_url'];
       

        return $track;
     }
     public static function findAll() {
        /* Création d'un tableau dans lequel on va stocker tous les utilisateurs */
        $res = array();

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from track");

        /* Exécution de la requête */
        $query->execute();

        /* Parcours du résultat */
        while ($d = $query->fetch(PDO::FETCH_BOTH)) {
            /* Création d'un Objet */
            $track = new Track();
            $artist->artist_id = $d['artist_id'];
            $artist->track_id = $d['track_id'];
            $artist->track_title = $d['track_title'];
            $artist->mp3_url = $d['info'];
            $res[] = $track;
        }

        return $res;
    }


  function afficher() {
        echo "track" . $this->track_id. " : " . $this->artist_id . ", mp3_url= " . $this->mp3_url . "<br/>\n";
    }
}
    
<?php

include 'Base.php';

class Tracks {

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
    private $title;

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
        $query = $c->prepare("INSERT INTO track (artist_id, track_id, title, mp3_url) VALUES (:artist_id, :track_id, :title, :mp3_url )");
        $query->bindParam(':artist_id', $this->artist_id, PDO::PARAM_INT);
        $query->bindParam(':track_id', $this->track_id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':mp3_url', $this->mp3_url, PDO::PARAM_STR);

        $query->execute();

        $this->track_id = $c->lastInsertId();
    }

    public function update() {

        /* On test si l'ID est défini, sinon on ne peut pas faire la mise à jour */
        if (!isset($this->track_id)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
        }
        /* Connexion à la base */
        $c = Base::getConnection();

        // préparation des requets
        $query = $c->prepare("update Tracks set artist_id= ?, title= ?, mp3_url= ? where track_id=?");
        $query->bindParam(1, $this->track_id, PDO::PARAM_int);
        $query->bindParam(2, $this->title, PDO::PARAM_STR);
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
        $query = $c->prepare("DELETE FROM Tracks where track_id=?");
        $query->bindParam(1, $this->track_id, PDO::PARAM_INT);

           /* Exécution de la requête */
        return $query->execute();
    }
    /**
     * Recherche d'un track avec son ID
     * 
     * @param type $id
     * @return \track
     */
     public static function findById($id) {
        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * Tracks where track_id=?");
        $query->bindParam(1, $id, PDO::PARAM_INT);

        /* Exécution de la requête */
        $query->execute();

        /* Récupération du résultat */
        $d = $query->fetch(PDO::FETCH_BOTH);

        /* Création d'un Objet */
        $track = new track();
        $artist->track= $d['artist_id'];
        $track->track_id = $d['track_id'];
        $artist->title = $d['title'];
        $artist->mp3_url = $d['mp3_url'];
       

        return $track;
     }
     
     /**
      * Permet de récupérer tous les tracks
      * 
      * @return \Tracks
      */
     public static function findAll() {
        /* Création d'un tableau dans lequel on va stocker tous les utilisateurs */
        $res = array();

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from tracks");

        /* Exécution de la requête */
        $query->execute();

        /* Parcours du résultat */
        while ($d = $query->fetch(PDO::FETCH_BOTH)) {
            /* Création d'un Objet */
            $track = new Tracks();
            $track->artist_id = $d['artist_id'];
            $track->track_id = $d['track_id'];
            $track->title = $d['title'];
            $track->mp3_url = $d['mp3_url'];
            $res[] = $track;
        }

        return $res;
    }
   /**
     * Affichage d'un utilisateur.
     */

  function afficher() {
        echo "track" . $this->track_id. " : " . $this->artist_id . ", mp3_url= " . $this->mp3_url . "<br/>\n";
    }
}
    
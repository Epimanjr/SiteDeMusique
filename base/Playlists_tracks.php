<?php

include 'Base.php';

class Playlists_trcks {
    
       /**
     * Id de du playlist
     * @var type 
     */
    private $playlist_id;

    /**
     * la psosition du playlist
     * @var type 
     */
    private $position;

    /**
     * id de track
      @var type 
     */
    private $track_id;

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
     * Insertion d'un nouveau track  de playlist  dans la base de données.
     */
    public function insert() {
        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("INSERT INTO playlist_track (playlist_id, position,track_id ,) VALUES ( :plalist_id, :position, :,track_id )");
        $query->bindParam(':playlist_id', $this->playlist_id, PDO::PARAM_INT);
        $query->bindParam(':position', $this->position, PDO::PARAM_INT);
        $query->bindParam(':track_id', $this->track_id, PDO::PARAM_INT);
        
        /* Exécution de la requête */
        $query->execute();

        $this->position  = $c->lastInsertId();
    }

    /**
     * Permet de mettre à jour les playlist dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function update() {

        /* On test si l'ID est défini, sinon on ne peut pas faire la mise à jour */
        if (!isset($this->position)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
        }

        /* Connexion à la base */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("update playlist_track set track_id= ? where playlist_id position=?");
        $query->bindParam(1, $this->playlist_id, PDO::PARAM_INT);
        $query->bindParam(2, $this->position, PDO::PARAM_INT);
        $query->bindParam(3, $this->track_id, PDO::PARAM_INT);
        
      /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Suppression de la position des playlist dans la base de données.
     * 
     * @return type
     * @throws Exception
     */
    public function delete() {
        /* On vérifie si l'id est renseigné, sinon on ne peut pas supprimer */
        if (!isset($this-> position)) {
            throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }

        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("DELETE FROM playlists_tracks where playlist_id position=?");
        $query->bindParam(1, $this->position , PDO::PARAM_INT);

        /* Exécution de la requête */
        return $query->execute();
    }

    /**
     * Recherche d'un playlist  avec son ID
     * 
     * @param type $id
     * @return \Users
     */
    public static function findById($id) {
        /* Connexion à la base de données */
        $c = Base::getConnection();

        /* Préparation de la requête */
        $query = $c->prepare("select * from playlists_tracks where playlist_id postion=?");
        $query->bindParam(1, $id, PDO::PARAM_INT);

        /* Exécution de la requête */
        $query->execute();

        /* Récupération du résultat */
        $d = $query->fetch(PDO::FETCH_BOTH);

        /* Création d'un Objet */
        $playlist_track = new Playlists_trcks();
        $playlist_track->playlist_id = $d['playlist_id'];
        $playlist_track->position = $d['possition'];
        $playlist_track->track_id = $d['track_id'];
       
        return $playlist_track;
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
        $query = $c->prepare("select * from playlists_tracks");

        /* Exécution de la requête */
        $query->execute();

        /* Parcours du résultat */
        while ($d = $query->fetch(PDO::FETCH_BOTH)) {
            /* Création d'un Objet */
            $playlist_track = new Playlists_trcks();
            $playlist_track->playlist_id = $d['playlist_id'];
            $playlist_track->position = $d['position'];
            $playlist_track->track_id = $d['track_id'];
            
            $res[] = $playlist_track;
        }

        return $res;
    }

    /**
     * Affichage d'un utilisateur.
     */
    function afficher() {
        echo "Playlist_track " . $this->position . " : " . $this->track_id . "<br/>\n";
    }

}




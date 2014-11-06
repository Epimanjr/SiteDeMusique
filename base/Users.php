<?php

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
    
    
    public function __construct() {
        //Constructeur vide
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

}

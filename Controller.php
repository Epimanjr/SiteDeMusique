<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


abstract class Controller {
    
    public  $tab;
    
    // définition de la méthode
    public function callAction($get) {

        $f = $this->tab[$get['a']];
        return $this->$f($get);
    }
}

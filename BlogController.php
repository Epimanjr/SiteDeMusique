<?php

include 'Controller.php';

class BlogController extends Controller {

    public function __construct() {
        $this->tab = array('list' => 'listAction',
            'detail' => 'detailAction',
            'cat' => 'catAction');
    }

    public function listAction($param) {
        $bil = Billet::findAll();
        $a = new Affichage($bil);
        $a->aff_general('liste');
    }

    public function detailAction($param) {

        $id = $param['id'];
        $bil = Billet::findById($id);
        $a = new Affichage($bil);
        $a->aff_general('detail');
    }

    public function catAction($param) {

        $id = $param['id'];
        $cat = Categorie::findById($id);
        $a = new Affichage($cat);
        $a->aff_general('cat');
    }

}

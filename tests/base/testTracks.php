<?php

/*
 * Ici nous allons procéder aux tests d'un "track"
 * Le programme : 
 *      -> Test de l'ajout d'un "track".
 *      -> Test de la modification d'un "track".
 *      -> Test de la suppression d'un "track".
 *      -> Test de la recherche d'un "track".
 * 
 * @author: Maxime BLAISE.
 */

include '../../base/Tracks.php';
include '../header.html';

/* On liste les morceaux déjà présent dans la base */
echo "\t<p><b>Test 1 : parcours des morceaux</b></p>\n";
listerTout();


function listerTout() {
    $all = Tracks::findAll();
    echo "<p>\n";
    foreach ($all as $track) {
        $track->afficher();
    }
    echo "</p>\n";
}

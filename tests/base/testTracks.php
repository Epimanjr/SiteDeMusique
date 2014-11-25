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

/* Dans un premier temps, on créer le morceau pour l'ajouter à la base */
echo "\t<p><b>Test 2 : ajout d'un morceau</b></p>\n";
$m = new Tracks();
$m->title = "Nouveau Morceau";
$m->mp3_url = "URL";
$m->artist_id = 1; // Attention à la clé étrangère
echo "<p>Insertion d'un morceau dans la base de donnees ... ";
$m->insert();
echo "SUCCESS.<br/>Son ID : " . $m->track_id . "</p>";

/* Ensuite, on recherche le morceau par son ID */
echo "\t<p><b>Test 3 : recherche d'un morceau par son id (ici " . $m->track_id . ")</b></p>\n";
$m2 = Tracks::findById($m->track_id);
$m2->afficher();

/* On fait une mise à jour  */
echo "\t<p><b>Test 4 : Mise à jour !</b></p>Modification de l'URL...<br/>\n";
$m->mp3_url = "Nouvelle URL !";
$m->update();
listerTout();


function listerTout() {
    $all = Tracks::findAll();
    echo "<p>\n";
    foreach ($all as $track) {
        $track->afficher();
    }
    echo "</p>\n";
}

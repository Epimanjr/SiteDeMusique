<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../base/Playlists.php';
include '../header.html';

/* On liste les utilisateurs déjà présent dans la base */
echo "\t<p><b>Test 1 : parcours des des playlists</b></p>\n";
listerTout();

/* Dans un premier temps, on créer les playlists pour l'ajouter à la base */
echo "\t<p><b>Test 2 : ajout d'un playlist</b></p>\n";
$p = new Playlists();
$p->user_id = 5;
$p->playlist_id = 2;
$p->playlist_name = "THIAM  Mohamad";
echo "<p>Insertion d'un playlist dans la base de donnees ... ";
$p->insert();
echo "SUCCESS.<br/>Son ID : " . $p->playlist_id . "</p>";

/* Ensuite, on recherche la playlist par son ID */
echo "\t<p><b>Test 3 : recherche d'un playlist par son id (ici " . $p->playlist_id . ")</b></p>\n";
$p2 = Playlists::findById($p->playlist_id);
$p2->afficher();

/* Ensuite, on recherche l'artiste par son nom */
echo "\t<p><b>Test 4 : recherche d'un playlist par son nom (ici " . $p->playlist_name . ")</b></p>\n";
echo "Test non implemente encore...\n";



/* On fait une mise à jour  */
echo "\t<p><b>Test 5 : Mise à jour !</b></p>Modification du nom de playlist...<br/>\n";
$p->playlist_name = "nouveau nom de playlist !";
$p->update();
listerTout();

/* Test de la suppression */
echo "\t<p><b>Test 6 : Suppression !</b></p>\n";
$p->delete();
listerTout();

include '../footer.html';

function listerTout() {
    $all = Playlists::findAll();
    echo "<p>\n";
    foreach ($all as $playlist) {
        $playlist->afficher();
    }
    echo "</p>\n";
}
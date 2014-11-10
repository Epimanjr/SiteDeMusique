<?php

/*
 * Ici nous allons procéder aux tests pour la classe Artists.
 * Le programme : 
 *      -> Test de l'ajout d'un artiste.
 *      -> Test de la modification d'un artiste.
 *      -> Test de la suppression d'un artiste.
 *      -> Test de la recherche d'un artiste.
 * 
 * @author: Maxime BLAISE.
 */

include '../../base/Artists.php';
include '../header.html';

/* On liste les utilisateurs déjà présent dans la base */
echo "\t<p><b>Test 1 : parcours des artistes</b></p>\n";
listerTout();

/* Dans un premier temps, on créer utilisateur pour l'ajouter à la base */
echo "\t<p><b>Test 2 : ajout d'un artiste</b></p>\n";
$a = new Artists();
$a->name = "Maxime";
$a->info = "Je suis ETUDIANT, ou pas.";
$a->image_url = "UneIMAGE";
echo "<p>Insertion d'un artiste dans la base de donnees ... ";
$a->insert();
echo "SUCCESS.<br/>Son ID : " . $a->artist_id . "</p>";

/* Ensuite, on recherche l'artiste par son ID */
echo "\t<p><b>Test 3 : recherche d'un artiste par son id (ici " . $a->artist_id . ")</b></p>\n";
$a2 = Artists::findById($a->artist_id);
$a2->afficher();

/* Ensuite, on recherche l'artiste par son nom */
echo "\t<p><b>Test 4 : recherche d'un artiste par son nom (ici " . $a->name . ")</b></p>\n";
echo "Test non implemente encore...\n";

/* On fait une mise à jour  */
echo "\t<p><b>Test 5 : Mise à jour !</b></p>Modification des infos...<br/>\n";
$a->info = "Nouvelles informations, je ne suis plus étudiant !";
$a->update();
listerTout();

/* Test de la suppression */
echo "\t<p><b>Test 7 : Suppression !</b></p>\n";
$a->delete();
listerTout();

include '../footer.html';

function listerTout() {
    $all = Artists::findAll();
    echo "<p>\n";
    foreach ($all as $artist) {
        $artist->afficher();
    }
    echo "</p>\n";
}

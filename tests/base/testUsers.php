<?php

/*
 * Ici nous allons procéder aux tests pour la classe Users.
 * Le programme : 
 *      -> Test de l'ajout d'un utilisateur.
 *      -> Test de la modification d'un utilisateur.
 *      -> Test de la suppression d'un utilisateur.
 *      -> Test de la recherche d'un utilisateur.
 * 
 * @author: Maxime BLAISE.
 */

include '../../base/Users.php';

/* On liste les utilisateurs déjà présent dans la base */
echo "<p><b>Test 1 : parcours des utilisateurs</b></p>\n";
listerTout();


/* Dans un premier temps, on créer utilisateur pour l'ajouter à la base */
echo "<p><b>Test 2 : ajout d'un utilisateur</b></p>\n";
$u = new Users();
$u->username = "Maxime";
$u->password = "azertyuiop";
$u->email = "maxime.blaise1@etu.univ-lorraine.fr";
echo "<p>Insertion d'un utilisateur dans la base de donnees ... ";
$u->insert();
echo "SUCCESS.<br/>Son ID : " . $u->user_id . "</p>";

/* Ensuite, on recherche l'utilisateur par son ID */
echo "<p><b>Test 3 : recherche d'un utilisateur par son id (ici " . $u->user_id . ")</b></p>\n";
$u2 = Users::findById($u->user_id);
$u2->afficher();

/* Ensuite, on recherche l'utilisateur par son nom */
echo "<p><b>Test 4 : recherche d'un utilisateur par son nom (ici " . $u->username . ")</b></p>\n";
echo "Test non implemente encore...\n";

/* Ensuite, on recherche l'utilisateur par son e-mail */
echo "<p><b>Test 5 : recherche d'un utilisateur par son e-mail (ici " . $u->email . ")</b></p>\n";
echo "Test non implemente encore...\n";

/* On fait une mise à jour  */
echo "<p><b>Test 6 : Mise à jour !</b></p>Modification de l'adresse e-mail...<br/>\n";
$u->email = "nouvelle adresse e-mail !";
$u->update();
listerTout();

/* Test de la suppression */
echo "<p><b>Test 7 : Suppression !</b></p>\n";
$u->delete();
listerTout();

function listerTout() {
    $all = Users::findAll();
    echo "<p>\n";
    foreach ($all as $user) {
        $user->afficher();
    }
    echo "</p>\n";
}

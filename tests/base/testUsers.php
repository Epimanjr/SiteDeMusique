<?php

/*
 * Ici nous allons procéder aux tests pour la classe Users.
 * Le programme : 
 *      -> Test de l'ajout d'un utilisateur.
 *      -> Test de la modification d'un utilisateur.
 *      -> Test de la suppression d'un utilisateur.
 *      -> Test de la recherche d'un utilisateur.
 */

include '../../base/Users.php';

/* Dans un premier temps, on créer utilisateur pour l'ajouter à la base */
$u = new Users("Maxime", "azertyuiop", "maxime.blaise1@etu.univ-lorraine.fr");
echo "<p>Insertion d'un utilisateur dans la base de donnees ... ";
$u->insert();
echo "SUCCESS.<br/>Son ID : " . $u->user_id . "</p>";





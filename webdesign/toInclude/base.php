<?php
	$dbhost = 'mysql:dbname=musichouse;host=127.0.0.1';
	$dbuser = 'root';
	$dbpass = '';
	
	try{
		$bdd = new PDO($dbhost, $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"'));
	} catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
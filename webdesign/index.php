<?php include("./toInclude/base.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"><!--<![endif]-->
<head>
	<title>Nom du site | Accueil</title>
	<meta name="description" CONTENT="Description de la page." />
	<?php include("./toInclude/head.php");?>
</head>
<body>
	<?php include("./toInclude/header.php");?>
	<article class="search">
		<header class="wrapper">
			<!-- Barre de recherche -->
			<h1>Rechercher une musique</h1>
			<p>
			<form class="searchBar" action="index.php" method="post">
				<input type="text" name="inputTitle" placeholder="Entrer un titre…" />
				<button type="submit" title="Rechercher la musique"><span class="icon-search"></span></button>
			</form>
			</p>
		</header>
		<section class="wrapper">
		<?php
			try{
				if(isset($_POST['inputTitle'])){
					$input = $_POST['inputTitle'];
					$request = $bdd->prepare('SELECT * FROM tracks WHERE title = "' . $_POST['inputTitle'] . '";');
					$request->execute();
					$track = $request->fetch(PDO::FETCH_ASSOC);
					if(!isset($track["artist_id"])){	
						echo 'Ce titre de musique n\'existe pas dans la base de données.';
					} else {
						$requestArtist = $bdd->prepare('SELECT * FROM artists WHERE artist_id = "' . $track["artist_id"] . '";');
						$requestArtist->execute();
						$artist = $requestArtist->fetch(PDO::FETCH_ASSOC);
						echo '<article class="song">'
							. '<section class="infos">'
								. '<h2>' . $track["title"] . '</h2>'
								. '<h3>' . $artist["name"] . '</h3>'
								. '<audio controls><source src="' . $track["mp3_url"] . '" type="audio/mpeg"></audio>'
							. '</section>'
							. '<section class="commands">'
								. '<div class="button"><p><a href="artiste.php?id=' . $track["artist_id"] . '" class="readBio" title="En savoir plus sur l\'artiste"><span class="icon-info"></span></a><p></div>'
								. '<div class="button"><p><a href="#" id="loadInsertToPlaylist" class="addToPlaylist" title="Ajouter à une playlist"><span class="icon-save"></span></a><p></div>'
							. '</section>'
						. '</article>';
						$requestArtist->closeCursor();
					}
					$request->closeCursor();
				}
			} catch(Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		?>
		</section>
	</article>
	<?php include("./toInclude/modals.php");?>
	<?php include("./toInclude/footer.php");?>
	<script type="text/javascript" src="scripts/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="scripts/modals.js"></script>
</body>
</html>
<?php include("./toInclude/base.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"><!--<![endif]-->
<?php 
	$title = '';
	if(!isset($_GET['id'])){
		$title = 'Inconnu';
	} else {
		$request = $bdd->prepare('SELECT * FROM artists WHERE artist_id = "' . $_GET['id'] . '";');
		$request->execute();
		$artist = $request->fetch(PDO::FETCH_ASSOC);
		$title = $artist["name"];
	}
?>
<head>
	<title>Nom du site | <?php echo $title; ?></title>
	<meta name="description" CONTENT="Description de la page." />
	<?php include("./toInclude/head.php");?>
</head>
<body>
	<?php include("./toInclude/header.php");?>
	<article class="artist">
		<section class="wrapper">
		<?php
			try{
				if(!isset($_GET['id'])){
					echo '<p>Erreur : cet artiste n\'a pas pu être identifié.</p>';
				} else {
					echo '<h1>' . $artist["name"] . '</h1>'
						. '<p><img src="' . $artist["image_url"] . '" />' . $artist["info"] . '</p>'
						. '<h1>Discographie :</h1>';
					
					$requestDiscography = $bdd->prepare('SELECT * FROM tracks WHERE artist_id = "' . $_GET['id'] . '";');
					$requestDiscography->execute();
					while($discography = $requestDiscography->fetch(PDO::FETCH_ASSOC)){
						echo '<article class="song">'
							. '<section class="infos">'
								. '<h2>' . $discography["title"] . '</h2>'
								. '<audio controls><source src="' . $discography["mp3_url"] . '" type="audio/mpeg"></audio>'
							. '</section>'
							. '<section class="commands">'
							. '<div class="button"><p>';
							if(!isset($_GET['pickedTrackID'])){
								echo '<a href="?pickedTrackID=1" id="loadInsertToPlaylist" class="addToPlaylist" title="Ajouter à une playlist">';
							} else {
								echo '<a href="?pickedTrackID=' . $track["artist_id"] . '#" id="loadInsertToPlaylist" class="addToPlaylist" title="Ajouter à une playlist">';
							}
							echo '<span class="icon-save"></span></a><p></div>'
							. '</section>'
						. '</article>';
					}
					$request->closeCursor();
					$requestDiscography->closeCursor();
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
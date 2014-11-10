<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"><!--<![endif]-->
<head>
	<title>Nom du site | Nom de l'artiste</title>
	<meta name="description" CONTENT="Description de la page." />
	<?php include("./toInclude/head.php");?>
</head>
<body>
	<?php include("./toInclude/header.php");?>
	<article class="artist">
		<section class="wrapper">
			<h1>Jimi Hendrix</h1>

			<p>James Marshall Hendrix (né Johnny Allen Hendrix le 27 novembre 1942 à Seattle, aux États-Unis, et mort le 18 septembre 1970 à Londres, en Angleterre), mieux connu sous le nom de Jimi Hendrix, est un guitariste, auteur-compositeur et chanteur américain, fondateur du groupe anglo-américain The Jimi Hendrix Experience, actif de 1966 à 1970. Malgré une carrière internationale longue de seulement quatre ans, il est considéré comme le plus grand joueur de guitare électrique et un des musiciens les plus importants du xxe siècle.</p>

			<p><img src="images/artistes/jimi.jpg" alt="Photo de l'artiste"/></p>

			<h1>Discographie :</h1>
			<article class="song">
				<section class="infos">
					<h2>Titre de la chanson</h2>
					<h3>Album - année</h3>
				</section>
				<section class="commands">
					<div class="button"><p><a href="" class="listen" title="Écouter"><span class="icon-play"></span></a><p></div>
					<div class="button"><p><a href="" class="addToPlaylist" title="Ajouter à une playlist"><span class="icon-save"></span></a><p></div>
				</section>
			</article>
			<article class="song">
				<section class="infos">
					<h2>Titre de la chanson</h2>
					<h3>Album - année</h3>
				</section>
				<section class="commands">
					<div class="button"><p><a href="" class="listen" title="Écouter"><span class="icon-play"></span></a><p></div>
					<div class="button"><p><a href="" class="addToPlaylist" title="Ajouter à une playlist"><span class="icon-save"></span></a><p></div>
				</section>
			</article>
			<article class="song">
				<section class="infos">
					<h2>Titre de la chanson</h2>
					<h3>Album - année</h3>
				</section>
				<section class="commands">
					<div class="button"><p><a href="" class="listen" title="Écouter"><span class="icon-play"></span></a><p></div>
					<div class="button"><p><a href="" class="addToPlaylist" title="Ajouter à une playlist"><span class="icon-save"></span></a><p></div>
				</section>
			</article>
		</section>
	</article>
	<?php include("./toInclude/modals.php");?>
	<?php include("./toInclude/footer.php");?>
	<script type="text/javascript" src="scripts/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="scripts/modals.js"></script>
</body>
</html>
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
				<input type="text" placeholder="Entrer un titre…" />
				<input type="submit" value="Rechercher" />
			</form>
			</p>
		</header>
		<section class="wrapper">
			<article class="song">
				<section class="infos">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe - année</h3>
				</section>
				<section class="commands">
					<div class="button"><p><a href="" class="readBio">Lire la bio de l'artiste</a><p></div>
					<div class="button"><p><a href="" class="listen">Écouter</a><p></div>
					<div class="button"><p><a href="" class="addToPlaylist">Ajouter à une playlist</a><p></div>
				</section>
			</article>
			<article class="song">
				<section class="infos">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe - année</h3>
				</section>
				<section class="commands">
					<div class="button"><p><a href="" class="readBio">Lire la bio de l'artiste</a><p></div>
					<div class="button"><p><a href="" class="listen">Écouter</a><p></div>
					<div class="button"><p><a href="" class="addToPlaylist">Ajouter à une playlist</a><p></div>
				</section>
			</article>
			<article class="song">
				<section class="infos">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe - année</h3>
				</section>
				<section class="commands">
					<div class="button"><p><a href="" class="readBio">Lire la bio de l'artiste</a><p></div>
					<div class="button"><p><a href="" class="listen">Écouter</a><p></div>
					<div class="button"><p><a href="" class="addToPlaylist">Ajouter à une playlist</a><p></div>
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
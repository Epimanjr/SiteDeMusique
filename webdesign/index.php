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
	<header>
		<div class="wrapper">
			<section class="logo">
				<a href="./"><img src="images/logo.png" alt="Logo du site" /></a>
			</section>
			<section class="menu">
				<nav>
				<ul>
					<li><a href="./">Accueil</a></li>
					<li><a href="./">Playlists</a></li>
					<li><a href="./">S'inscrire</a></li>
					<li><a href="./">Se connecter</a></li>
				</ul>
				</nav>
			</section>
		</div>
	</header>
	<article class="wrapper">
		<section class="search">
			<!-- Barre de recherche -->
			<h1>Rechercher une musique</h1>
			<p>
			<form class="search-bar">
				<input type="text" placeholder="Entrer un titre…" />
				<input type="button" value="Rechercher" />
			</form>
			</p>
		</section>
		<section class="result">
			<article class="song">
				<section class="song-title">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe</h3>
				</section>
				<section class="song-button">
					<p><a href="" class="button">Écouter</a></p>
				</section>
			</article>
			<article class="song">
				<section class="song-title">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe</h3>
				</section>
				<section class="song-button">
					<p><a href="" class="button">Écouter</a></p>
				</section>
			</article>
			<article class="song">
				<section class="song-title">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe</h3>
				</section>
				<section class="song-button">
					<p><a href="" class="button">Écouter</a></p>
				</section>
			</article>
			<article class="song">
				<section class="song-title">
					<h2>Titre de la chanson</h2>
					<h3>Chanteur/groupe</h3>
				</section>
				<section class="song-button">
					<p><a href="" class="button">Écouter</a></p>
				</section>
			</article>
		</section>
	</article>
	<footer>
		<p class="wrapper">
		Projet de programmation Web réalisé par :<br />
		COLBE Sébastien<br />
		HUGO Yohann<br />
		BLAISE Maxime<br />
		THIAM Mohammad<br />
		</p>
	</footer>
</body>
</html>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"><!--<![endif]-->
<head>
	<title>Nom du site | Playlists</title>
	<meta name="description" CONTENT="Description de la page." />
	<?php include("./toInclude/head.php");?>
</head>
<body>
	<?php include("./toInclude/header.php");?>
	<article class="userPlaylists">
		<header class="wrapper">
			<h1>Vos playlists</h1>
			<div class="button"><p><a href="#" id="loadCreatePlaylist" class="newPlaylist">+</a> Créer une nouvelle playlist</p></div>
		</header>
		<section class="wrapper">
			<article class="playlist">
				<header>
					<section class="infos">
						<h2>#1 - Nom de la playlist</h2>
					</section>
					<section class="commands">
						<!-- À créer en javascript ou php : un "switch" de Ouvrir/Fermer. -->
						<div class="button"><p><a href="#playlistContent" class="displayPlaylist">Ouvrir</a></p></div>
						<div class="button"><p><a href="" class="hidePlaylist">Fermer</a></p></div>
						<div class="button"><p><a href="" class="deletePlaylist">x</a></p></div>
					</section>
				</header>
				<section id="playlistContent">
					<article class="song">
						<section class="infos">
							<h2>Titre de la chanson</h2>
							<h3>Chanteur/groupe - année</h3>
						</section>
						<section class="commands">
							<div class="button"><p><a href="" class="readBio">Lire la bio de l'artiste</a><p></div>
							<div class="button"><p><a href="" class="listen">Écouter</a><p></div>
							<div class="button"><p><a href="" class="up">↑</a></p></div>
							<div class="button"><p><a href="" class="down">↓</a></p></div>
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
							<div class="button"><p><a href="" class="up">↑</a></p></div>
							<div class="button"><p><a href="" class="down">↓</a></p></div>
						</section>
					</article>
				</section>
			</article>
			<article class="playlist">
				<header>
					<section class="infos">
						<h2>#2 - Nom de la playlist</h2>
					</section>
					<section class="commands">
						<!-- À créer en javascript ou php : un "switch" de Ouvrir/Fermer. -->
						<div class="button"><p><a href="#playlistContent2" class="displayPlaylist">Ouvrir</a></p></div>
						<div class="button"><p><a href="" class="hidePlaylist">Fermer</a></p></div>
						<div class="button"><p><a href="" class="deletePlaylist">x</a></p></div>
					</section>
				</header>
				<section id="playlistContent2">
					<article class="song">
						<section class="infos">
							<h2>Titre de la chanson</h2>
							<h3>Chanteur/groupe - année</h3>
						</section>
						<section class="commands">
							<div class="button"><p><a href="" class="readBio">Lire la bio de l'artiste</a><p></div>
							<div class="button"><p><a href="" class="listen">Écouter</a><p></div>
							<div class="button"><p><a href="" class="up">↑</a></p></div>
							<div class="button"><p><a href="" class="down">↓</a></p></div>
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
							<div class="button"><p><a href="" class="up">↑</a></p></div>
							<div class="button"><p><a href="" class="down">↓</a></p></div>
						</section>
					</article>
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
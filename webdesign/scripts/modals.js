$(document).ready(function(){
	/* Inscription */
	$("#loadRegistration").click(function(){
		$("#modalBackground, #modalRegistration").toggleClass("active");
	});
	/* Connexion */
	$("#loadLogin").click(function(){
		$("#modalBackground, #modalLogin").toggleClass("active");
	});
	/* Création d'une playlist */
	$("#loadCreatePlaylist").click(function(){
		$("#modalBackground, #modalCreatePlaylist").toggleClass("active");
	});
});
$(document).ready(function(){
	/* Inscription */
	$("#loadRegistration").click(function(){
		$("#modalBackground, #modalRegistration").toggleClass("active");
	});
	/* Connexion */
	$("#loadLogin").click(function(){
		$("#modalBackground, #modalLogin").toggleClass("active");
	});
	/* Cr�ation d'une playlist */
	$("#loadCreatePlaylist").click(function(){
		$("#modalBackground, #modalCreatePlaylist").toggleClass("active");
	});
	/* Ajouter � une playlist */
	$("#loadInsertToPlaylist").click(function(){
		$("#modalBackground, #modalInsertToPlaylist").toggleClass("active");
	});
});
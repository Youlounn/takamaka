<?php 
	session_start(); 
	$idUser = $_SESSION['Auth']['idUser'];
	$nom = $_SESSION['Auth']['nom'];
	$prenom = $_SESSION['Auth']['prenom'];
	$type = $_SESSION['Auth']['type'];
	$email = $_SESSION['Auth']['email'];
?>
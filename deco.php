<?php 
		session_start(); //Démarrer la session
	if(isset($_SESSION["nom"])){ // si un utilisateur est authentifié
		session_unset(); //détruire les variable
		session_destroy();//détruire la session
		header("Location:jeu.php");
	}
?>
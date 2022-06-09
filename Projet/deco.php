<?php 
		session_start(); //Démarrer la session
	if(isset($_SESSION["login"])){ // si un utilisateur est authentifié
		session_unset(); //détruire les variable
		session_destroy();//détruire la session
		header("Location:connexion.php");
	}
		$_COOKIE["Ligne1"] = "[0,0,0,0,0,0,0,0]";
    	$_COOKIE["Ligne2"] = "[0,0,0,0,0,0,0,0]";
    	$_COOKIE["Ligne3"] = "[0,0,0,0,0,0,0,0]";
    	$_COOKIE["Ligne4"] = "[0,0,0,0,0,0,0,0]";
    	$_COOKIE["Ligne5"] = "[0,0,0,0,0,0,0,0]";
    	$_COOKIE["Ligne6"] = "[0,0,0,0,0,0,0,0]";
   		$_COOKIE["Ligne7"] = "[0,0,0,0,0,0,0,0]";
   		$_COOKIE["Ligne8"] = "[0,0,0,0,0,0,0,0]";
    	require("save.php");
	header("Location:connexion.php");
?>

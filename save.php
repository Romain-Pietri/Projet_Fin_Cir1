<?php

	require("connexiondb.php");

	$ligne= $_COOKIE["Ligne1"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 1";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne2"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 2";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne3"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 3";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne4"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 4";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne5"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 5";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne6"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 6";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne7"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 7";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= $_COOKIE["Ligne8"]; 
	$requete="UPDATE clone SET Ligne= '$ligne' WHERE ID = 8";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

?>
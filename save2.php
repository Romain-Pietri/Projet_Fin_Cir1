<?php

	require("connexiondb.php");
	$requete = "DELETE FROM grilles";
	$resultat = mysqli_query($connexion,$requete);

	$ligne= serialize($_COOKIE["Ligne1"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,1)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne2"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,2)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne3"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,3)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne4"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,4)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne5"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,5)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne6"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,6)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne7"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,7)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

	$ligne= serialize($_COOKIE["Ligne8"]); 
	$requete="INSERT INTO grilles(Ligne, ID) VALUES ($ligne,8)";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}

?>
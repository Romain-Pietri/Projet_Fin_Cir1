<?php

	$requete="SELECT Ligne FROM clone WHERE ID = 1 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array1 = json_decode($UneLigne["Ligne"]);        
		}
	}
	
	
	$requete="SELECT Ligne FROM clone WHERE ID = 2 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array2 = json_decode($UneLigne["Ligne"]);        
		}
	}

	$requete="SELECT Ligne FROM clone WHERE ID = 3 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array3 = json_decode($UneLigne["Ligne"]);        
		}
	}

	$requete="SELECT Ligne FROM clone WHERE ID = 4 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array4 = json_decode($UneLigne["Ligne"]);        
		}
	}
	$requete="SELECT Ligne FROM clone WHERE ID = 5 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array5 = json_decode($UneLigne["Ligne"]);        
		}
	}

	$requete="SELECT Ligne FROM clone WHERE ID = 6 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array6 = json_decode($UneLigne["Ligne"]);        
		}
	}
	$requete="SELECT Ligne FROM clone WHERE ID = 7 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array7 = json_decode($UneLigne["Ligne"]);        
		}
	}
	$requete="SELECT Ligne FROM clone WHERE ID = 8 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$array8 = json_decode($UneLigne["Ligne"]);        
		}
	}
	$tab = [$array1,$array2,$array3,$array4,$array5,$array6,$array7,$array8];

?>

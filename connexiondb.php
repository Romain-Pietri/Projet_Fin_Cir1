<?php 
	$hostname= "localhost"; //nom du serveur (localhost)
	$username="root";//nom d'utilisateur pour accéder au serveur (root)
	$password="root"; //mot de passe pour accéder au serveur (root)
	$dbname="gadget"; //nom de la base de données			
	
	$connexion = mysqli_connect($hostname, $username, $password, $dbname);
	 
	if (!$connexion) {
		echo "Erreur de connexion".mysqli_connect_errno();
		die();
	}
	else{
		return $connexion;
	}
<?php
	if(isset($_POST['Envoyer'])){
		$themeChoisi=$_POST['Choixtheme'];
		
		//Créer la cookie nommé theme pour y enregistrer le thème choisi par l'utilisateur
		setcookie("theme" , $themeChoisi , time()+(365*24*3600));
	}
	header("Location: parametres.php");
	
?>
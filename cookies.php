<?php
	if(isset($_POST['Envoyer'])){
		$id=$_POST['ID'];
		
		//Créer la cookie nommé theme pour y enregistrer le thème choisi par l'utilisateur
		setcookie("ID" , $id , time()+(365*24*3600));
	}
	header("Location: jeu.php");
	
?>

<?php		
	if (isset($_COOKIE['id'])){ 
		$id=$_COOKIE['id'];	
	}
	else{
		$id=0;
	}
?>
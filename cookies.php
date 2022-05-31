<?php
	session_start();
	

	if (isset($_COOKIE['id'])){ 
		$_COOKIE['id'] = "";
	}

	if(isset($_POST["Generate"])){
		$_SESSION["taille"] = $_POST["taille"];
		setcookie("id" , 0 , time()+(365*24*3600));
		header("Location: jeu.php");
	}


	if(isset($_POST['Verify'])){
		require("save.php");
		setcookie("id" , 1 , time()+(365*24*3600));
		header("Location: interface.php");
	}
	

	if(isset($_POST['Hint'])){
		require("save.php");
		setcookie("id" , 2 , time()+(365*24*3600));
		header("Location: interface.php");
	}
	

	if(isset($_POST['Solve'])){
		require("save.php");
		setcookie("id" , 3 , time()+(365*24*3600));
		header("Location: interface.php");
	}

	if(isset($_POST['Create'])){
		require("save2.php");
		setcookie("id" , 5 , time()+(365*24*3600));
		header("Location: interface.php");
	}
	
?>

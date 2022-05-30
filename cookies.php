<?php
	session_start();
	require("save.php");

	if (isset($_COOKIE['id'])){ 
		$_COOKIE['id'] = "";
	}

	if(isset($_POST["Generate"])){
		$_SESSION["taille"] = $_POST["taille"];
		setcookie("id" , 0 , time()+(365*24*3600));
		header("Location: interface.php");
	}


	if(isset($_POST['Verify'])){
		setcookie("id" , 1 , time()+(365*24*3600));
		header("Location: interface.php");
	}
	

	if(isset($_POST['Hint'])){
		setcookie("id" , 2 , time()+(365*24*3600));
		header("Location: interface.php");
	}
	

	if(isset($_POST['Solve'])){
		setcookie("id" , 3 , time()+(365*24*3600));
		header("Location: interface.php");
	}
	
?>
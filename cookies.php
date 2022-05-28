<?php
	require("save.php");

	if(isset($_POST['Verify'])){
		$id=1;
		if (isset($_COOKIE['id'])){ 
			$id=$_COOKIE['id'];
		}
		else{
			setcookie("id" , $id , time()+(365*24*3600));
		}
	}
	header("Location: interface.php");


	if(isset($_POST['Hint'])){
		$id=2;
		if (isset($_COOKIE['id'])){ 
			$id=$_COOKIE['id'];
		}
		else{
			setcookie("id" , $id , time()+(365*24*3600));
		}
	}
	header("Location: interface.php");


	if(isset($_POST['Solve'])){
		$id=3;
		if (isset($_COOKIE['id'])){ 
			$id=$_COOKIE['id'];
		}
		else{
			setcookie("id" , $id , time()+(365*24*3600));
		}
	}
	header("Location: interface.php");
	
?>
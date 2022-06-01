<?php
	session_start();
	require("connexiondb.php");
	

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
		$log=$_SESSION["login"];
		$request="SELECT Indice FROM utilisateurs WHERE login='$log'";
		$request2="UPDATE utilisateurs SET Indice=Indice-1 WHERE login='$log'";
		$result=mysqli_query($connexion,$request);
				if ( $result == FALSE ){
					echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
					die();
				}
				while($ligne=mysqli_fetch_assoc($result)){
					if($ligne['Indice']==0){
						mysqli_close($connexion);
						header("Location:jeu.php");
					}
				}
				$result2=mysqli_query($connexion,$request2);
					if ( $result2 == FALSE ){
					echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
					die();
					}
					header("Location:interface.php");
					mysqli_close($connexion);
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

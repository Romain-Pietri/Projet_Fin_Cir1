<?php
	session_start();
	require("connexiondb.php");
	

	if (isset($_COOKIE['id'])){ 
		$_COOKIE['id'] = "";
	}
	
	if(isset($_POST["Manual_Create"])){
		if(!isset($_POST["taille"])){
			header("Location:taillegen.php");
		}
		else{
			$_SESSION["taille2"] = $_POST["taille"] * 1;
			header("Location:manuel.php");
		}
	}

	if(isset($_POST["Abandon"])){
		$_COOKIE["Ligne1"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne2"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne3"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne4"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne5"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne6"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne7"] = "[0,0,0,0,0,0,0,0]";
		$_COOKIE["Ligne8"] = "[0,0,0,0,0,0,0,0]";
		require("save.php");
		require("save2.php");
		unset($_SESSION["taille"]);
		unset($_SESSION["taille2"]);
		header("Location:taille.php");
	}
	
	if(isset($_POST["Generate"])){
		if(!isset($_POST["taille"])){
			header("Location:taille.php");
		}
		else {
			$_SESSION["taille"] = $_POST["taille"] * 1;
			setcookie("id" , 0 , time()+(365*24*3600));
			header("Location: interface.php");
		}
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
					if($ligne['Indice']<=0){
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
		$_SESSION["Solvetrue"]="1";
	}

	if(isset($_POST['Create'])){
		require("save2.php");
		setcookie("id" , 4 , time()+(365*24*3600));
		header("Location: interface.php");
	}

	if(isset($_POST["Restart"])){
		require("connexiondb.php");
		for($i = 1; $i <= 8; $i++){
			$requete="UPDATE clone SET Ligne= '[0,0,0,0,0,0,0,0]' WHERE ID = $i";
			$resultat = mysqli_query($connexion,$requete);
			$_COOKIE["Ligne1"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne2"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne3"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne4"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne5"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne6"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne7"] = "[0,0,0,0,0,0,0,0]";
			$_COOKIE["Ligne8"] = "[0,0,0,0,0,0,0,0]";
		}
		header("Location:jeu.php");
	}
	
?>

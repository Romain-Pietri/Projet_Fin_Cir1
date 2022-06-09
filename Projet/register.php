<?php
    session_start();
?>

<!DOCTYPE html> 
<html lang="fr">
<head> 
	<meta charset="UTF-8">
	<title> Starship invader ! </title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
	<link rel="icon" href="images/log.png">
</head>

<body>
		<header>
			
			<a><img id="logo" src="images/log.png"></a>
			<br><br>
				<?php		
					if (isset($_COOKIE['theme'])){ 
						$style=$_COOKIE['theme'];	
					}
					else {
						$style="space1";
					}
				?>
			<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

			<br><br><br><br>

		    <h1>Registration</h1>
			<br>

    	</header>
    
<main>
	<img id="gadget" src="images/gadget1.gif">

	<?php

		require_once("fonction.php");

		$logErr = $passErr = $confirmErr = "";
		$log = $pass = $confirm = "";

		if(isset($_POST['envoi'])==true){

		  	$log = $_POST["log"];


		  if (verificationPassword($_POST["pass"])==false) {
		    $passErr = "correct password is required (8 characters, 1 number, at least 1 uppercase and 1 lowercase)";
		  } else {
		    $pass = hash('sha256', $_POST['pass']);
		  }

		  if ($_POST["confirm"] != $_POST["pass"]) {
		    $confirmErr = "Password does not match";
		  } else {
		    $confirm = $_POST["confirm"];
		  }
		}

	?>

		<form method="post" action="">
     		<legend>Nickname :</legend>
     		<input type="text" name="log" required>
     		<br>
     		<legend>Password :</legend>
     		<input type="password" name="pass"  required>
     		<span class="error"> <?php echo $passErr;?></span>
     		<br>
     		<legend>Confirmation :</legend>
     		<input type="password" name="confirm" required>
     		<span class="error"> <?php echo $confirmErr;?></span>
     		<br><br>
     		<input type="submit" name="envoi" value="Register"/>
		</form>
		<form action="taille.php">
		<input type="submit" name="send" value="GO BACK"/>
		</form>

		<?php
			if(isset($_POST["envoi"]) && $logErr == "" && $passErr == "" && $confirmErr =="" ){
				
				require("connexiondb.php");
				$request0="SELECT * FROM utilisateurs";
				$result0=mysqli_query($connexion,$request0);
				$count=mysqli_num_rows($result0);
				$count=$count+1;
				$request="INSERT INTO utilisateurs(ID,login,password,Score,Indice,Moula,NbGrille,Grille4,Grille6,Grille8,ManuGrille) VALUES ('$count','$log','$pass','0','5','0','0','0','0','0','0')";
				$resultat=mysqli_query($connexion,$request);
				if ( $resultat == FALSE ){
								echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
								die();
							}
				$request2="INSERT INTO badge(ID,Badge1,Badge2,Badge3,Badge4,Badge5,Badge6,Badge7,Badge8,Badge9,Badge10) VALUES ('$count','0','0','0','0','0','0','0','0','0','0')";
				$resultat2=mysqli_query($connexion,$request2);
				if ( $resultat2 == FALSE ){
								echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
								die();
							}
				mysqli_close($connexion);
				header("Location:connexion.php");
				}
			
		?>

</main> 
</body>
</html>
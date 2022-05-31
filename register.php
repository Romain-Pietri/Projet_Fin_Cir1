<?php
    session_start();

    require "header.php";
    ?>

    <h1>Registration</h1>
	<br>

    </header>

<style>.error{color: red;margin-left:375px ;}</style>

<main>

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
     		<input type="text" name="log" placeholder="Enter your nickname" required>
     		<br>
     		<legend>Password :</legend>
     		<input type="password" name="pass"  placeholder="Enter your password" required>
     		<span class="error"> <?php echo $passErr;?></span>
     		<br>
     		<legend>Confirmation :</legend>
     		<input type="password" name="confirm"  placeholder="Confirm your password" required>
     		<span class="error"> <?php echo $confirmErr;?></span>
     		<br><br>
     		<input type="submit" class="submit" name="envoi" value="Register"/>
</form>

<?php
	if(isset($_POST["envoi"]) && $logErr == "" && $passErr == "" && $confirmErr =="" ){
		
		require("connexiondb.php");
		
		$request="INSERT INTO utilisateurs(login,password,Score,Indice,Moula) VALUES ('$log','$pass','0','5','0')";
		$resultat=mysqli_query($connexion,$request);
		if ( $resultat == FALSE ){
						echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
						die();
					}
		mysqli_close($connexion);
		header("Location:connexion.php");
		}
	
	?>

</main> 
<br><br>

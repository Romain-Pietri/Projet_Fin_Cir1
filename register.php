<?php
    session_start();

    require "header.php";
    ?>

    <header>

        <button> <a href="score.php"> Scores </a> </button>

        <button> <a href="connexion.php"> Connect </a> </button>

        <button> <a href="reglesjeu.php"> Rules </a> </button>

    </header>

<main>
<form class="para" method="post" action="">
	<fieldset>
		<legend>Créez votre compte</legend>
     		<label>Login :</label>
     		<input type="text" name="log" placeholder="Entrez votre login" required>
     		<label>Password :</label>
     		<input type="text" name="pass"  placeholder="Entrez votre mot de passe" required>
     		<input type="submit" name="envoi" value="Créer"/>
	</fieldset>
	</form>
	<?php
	if(isset($_POST["envoi"])){
	$log=$_POST["log"];
	$pass=$_POST["pass"];
	require("connexiondb.php");
	$request="INSERT INTO gadget (login,password) VALUES ('$log','$pass')";
	$resultat=mysqli_query($connexion,$request);
	if ( $resultat == FALSE ){
					echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
					die();
				}
	else{
		echo '<div class="para">
				<h1> Création réussie !</h1>
				<br>
				<p> Retournez à la page de login </p>';
	}
	mysqli_close($connexion);
	}
	
	?>
</main> 
<footer>

        <?php require 'footer.php'; ?>



    </footer>
</body>
</html>
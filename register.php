<?php
    session_start();

    require "header.php";
    ?>

    <h1>Registration</h1>
	<br>

    </header>

<main>

<form class="formLetter" method="post" action="">
	<fieldset>
		<legend>Registration</legend>
     		<label>Nickname :</label>
     		<input type="text" name="log" placeholder="Enter your nickname" required>
     		<br>
     		<label>Password :</label>
     		<input type="password" name="pass"  placeholder="Enter your password" required>
     		<br><br>
     		<input type="submit" name="envoi" value="Register"/>
	</fieldset>
</form>

<?php
	if(isset($_POST["envoi"])){
		$log = $_POST["log"];
		$pass = $_POST["pass"];
		require("connexiondb.php");
		$request="INSERT INTO utilisateurs(login,password,Score) VALUES ('$log','$pass','0')";
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
<?php require 'footer.php'; ?>
<?php
    session_start();

    require "header.php";
?>

	<h1>Welcome to Avosloupes! Please login for a better experience !</h1>
	<br>
    </header>
    
<main>

<!--Menu-->
<?php
	if(empty($_SESSION["nom"])){
?>

	<form class="formLetter" action="" method="post">
     	<fieldset>
     		<legend>Login :</legend>
     		<label>Nickname :</label>
     		<input type="text" name="login" placeholder="Enter your nickname" required>
     		<br>
     		<label>Password :</label>
     		<input type="password" name="passwd" placeholder="Enter your password" required>
     		<br><br>
     		<input type="submit" name="send" value="Connect"/>
     		<br>
     		<p> No account ?<a href='register.php'> Registration</a></p>
     	</fieldset>
     </form>

<?php
	}
		else
			echo'<div class="para">
				<h1> Logout here!</h1>
				<br>
				<a href="deco.php"><img id="start" src="images/logout.png"></a>
				</div>';
		?>


<?php
	if(isset($_POST["send"])){

			$login=$_POST["login"];
			$mdp=hash('sha256', $_POST['passwd']);

			require("connexiondb.php");

			$request="SELECT login, password FROM utilisateurs";
			$result=mysqli_query($connexion,$request);

			if ( $result == FALSE ){
					echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
					die();
				}

			while($ligne=mysqli_fetch_assoc($result)){

				if($ligne['login']==$login && $ligne['password']==$mdp){
					$_SESSION["nom"]=$login;
					mysqli_close($connexion);
					echo '<div class="para">
				<h1> Successful connection !</h1>
				<br>
				<p> You can start your investigation! </p>
				<br>
				<a href="reglesjeu.php"><img id="start" src="images/starting.png"></a>
				</div>';
				}
			}
	}
			
	?>
	
</main>
<br><br>
<?php require 'footer.php'; ?>
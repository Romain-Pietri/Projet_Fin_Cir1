<?php
    session_start();

    require "header.php";
?> 

    </header>
    <img id="title" src="images/titre.gif">
<main>
	<img id="gadget" src="images/gadget1.gif">

<?php
	if(empty($_SESSION["login"])){
?>
 
<form action="" method="post">
	<legend id="connect">PLAYER NAME:</legend>
	<input type="text" name="login" required>
	<legend>PASSWORD:</legend>
	<input type="password" name="passwd" required>

	<input type="submit" name="send" value="CONNECT"/>
	<p> No account ?<a href='register.php'> Registration</a></p>

</form>

<?php
	}
		else
			echo'<div class="logout">
				<h1> Logout here!</h1>
				<br>
				<a href="deco.php"><img id="logout" src="images/logout.png"></a>
				</div>
				<div class="logout">
				<h1> Go back to game !</h1>
				<br>
				<a href="jeu.php"><img id="logout" src="images/log.png"></a>
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
					$_SESSION["login"]=$login;
					$request2="SELECT Indice FROM utilisateurs WHERE login='$login'";
					$result2=mysqli_query($connexion,$request2);
					$startindice=mysqli_fetch_assoc($result2);
					$_SESSION["indice"]=$startindice;
					mysqli_close($connexion);
					header("location:regles.php");
				}
			}
	}
			
	?>
	
</main>
<br><br>

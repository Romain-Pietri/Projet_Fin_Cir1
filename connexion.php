<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
</head>
<body>
    <header>
    <?php
    session_start();

    require "header.php";
    ?>

<button>
    <a href="r�gles.php">
    Voir les r�gles
    </a>
    </button>

    </header>
<main>
<?php
	if(empty($_SESSION["nom"])){
?>
	<form class="para" method="post" action="">
		<fieldset>
     			<legend>Connexion à votre compte</legend>
     			<label>Login :</label>
     			<input type="text"  name="login" placeholder="Entrez votre login" required>
     			<label>Password :</label>
     			<input type="text" name="passwd"  placeholder="Entrez votre mot de passe" required>
     			<input type="submit" name="send" value="Envoyer"/>
     	</fieldset>
	</form>
		<?php
	}
		else
			echo'<div class="para">
				<h1> Par ici la déconnexion !</h1>
				<br>
				<a href="deco.php" class="envoyer">Déconnexion </a> 
				</div>';
		?>
	<?php
	if(isset($_POST["send"])){
			$login=$_POST["login"];
			$mdp=$_POST["passwd"];
			require("connexiondb.php");
			$request="SELECT * FROM gadget";
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
				<h1> Connexion réussie !</h1>
				<br>
				<p> Vous pouvez commencer votre enquête ! </p>
				</div>';
				}
			}
	}
			
	?>
	<div class="para">
	<h1> Vous n'avez pas de compte ? Cliquez ici pour vous en créer un </h1>
	<br>
	<a href="register.php" class="envoyer"> Créer un compte</a>
	</div>
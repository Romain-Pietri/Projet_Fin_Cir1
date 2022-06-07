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

		</header>

    	<br><br><br><br><br><br>

    <img id="title" src="images/titre.gif">

<main>

	<img id="gadget" src="images/gadget1.gif">

	<?php if(empty($_SESSION["login"])){ ?>
 
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
				<a href="reset.php"><img id="logout" src="images/log.png"></a>
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
						header("location:taille.php");
					}
				}
		}
				
	?>
	
</main>
</body>
</html>
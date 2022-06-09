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

		<audio autoplay id="myAudio" src="images/music1.mp3" preload="auto"></audio>
	
	<main>
		<br><br><br>
		<img id="title" src="images/titre.gif">
		<img id="speak" src="images/bulle.gif">
		<img id="gadget" src="images/gadget1.gif">


		<a id="button" href="Projet/connexion.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        START
    	</a>

	</main>
</body>
</html>
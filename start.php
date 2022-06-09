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
		<link rel="stylesheet" href ="Projet/space1.css"/>

		</header>

		<audio autoplay id="myAudio" src="Projet/images/music1.mp3" preload="auto"></audio>
	
	<main>
		<br><br><br>
		<img id="title" src="Projet/images/titre.gif">
		<img id="speak" src="Projet/images/bulle.gif">
		<img id="gadget" src="Projet/images/gadget1.gif">


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
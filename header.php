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

			<nav>
			  <a href="taille.php">GAME</a>
			  <a href="score.php">SCORE</a>
			  <a href="regles.php">RULES</a>
			  <div id="indicator"></div>
			</nav>
			<a href="parametres.php"><img id="parametres" src="images/para.png"></a>
			<a href="deco.php"><img id="parametres" src="images/logout.png"></a>

		    <a><img id="logo" src="images/log.png"></a>

	<?php		
		if (isset($_COOKIE['theme'])){ 
			$style=$_COOKIE['theme'];	
		}
		else {
			$style="space1";
		}
		?>
		<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

		<?php
		if($_COOKIE['music']==0){
		 	echo'<audio autoplay><source src="images/music1.mp3" type="audio/mpeg"></audio>';
		}
	?>
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

	<?php		
		if (isset($_COOKIE['theme'])){ 
			$style=$_COOKIE['theme'];	
		}

		else {
			$style="space1";
		}
	?>
	<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

		<header>
				<a><img id="logo" src="images/log.png"></a>
				<a href="theme.php"><img id="theme" src="images/para.png"></a>
				<a href="deco.php"><img id="theme" src="images/logout.png"></a>
			<nav class="menu">
				<ul>
					<li><a href="jeu.php"> Game </a></li>
			        <li><a href="reglesjeu.php"> Rules </a></li>
			        <li><a href="connexion.php"> Login </a></li>
		    	</ul>
		    </nav>
				<br>

<!DOCTYPE html> 
<html lang="fr">
<head> 
	<meta charset="UTF-8">
	<title> A vos loupes ! </title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
	<link rel="icon" href="images/logo.png">
</head>

<body>

	<?php		
		if (isset($_COOKIE['theme'])){ 
			$style=$_COOKIE['theme'];	
		}
		else {
			$style="theme1";
		}
	?>
	<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

		<header>
		<br>
		<h1> Avoloupes ! </h1>
		<a><img id="logo" src="images/logo.png"></a>
		<a href="theme.php"><img id="theme" src="images/para.png"></a>
		<br>

        

        <br>

        <button> <a href="score.php"> Scores </a> </button>

        <button> <a href="connexion.php"> Connect </a> </button>

        <button> <a href="reglesjeu.php"> Rules </a> </button>

    </header>
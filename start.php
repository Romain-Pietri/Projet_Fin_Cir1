<?php 
session_start();
?>

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
		<img id="title" src="images/titre.gif">
		<img id="speak" src="images/bulle.gif">
		<img id="gadget" src="images/gadget1.gif">


		<a id="button" href="connexion.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        START
    	</a>

	</main>
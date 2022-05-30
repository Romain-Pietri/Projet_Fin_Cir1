<?php 
session_start();
if(isset($_COOKIE['music'])&&$_COOKIE['music']!=1){
	$music=0;
}
setcookie("music" , $music , time()+(365*24*3600));

?>

	   <?php		
			if (isset($_COOKIE['theme'])){ 
				$style=$_COOKIE['theme'];	
			}
			else {
				$style="space1";
			}
		?>
		<link rel="stylesheet" href ="space1.css"/>

		<?php
			if($_COOKIE['music']==0){
				echo'<audio autoplay><source src="images/music.mp3" type="audio/mpeg"></audio>';
			}
		?>

	</header>

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
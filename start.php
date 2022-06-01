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
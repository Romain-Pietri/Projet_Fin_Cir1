 <?php
	session_start();
	require "header.php";
?>

<h1> Settings </h1>
		<br><br>
	</header>
	
	<p> Theme settings : </p>
	<br>


	<?php		
		if (isset($_COOKIE['theme'])){ 
			$style=$_COOKIE['theme'];	
		}
		else{
			$style="space1";
		}
	?>
	<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

	<a><img id="img" src="images/space1.gif"></a>
	<a><img id="img" src="images/space2.gif"></a>
	<a><img id="img" src="images/space3.gif"></a>
	<br><br><br>

	
		<form method="post" action="themeappli.php">		
			<p class="mention">Choose your favorite theme :</p>
			<select name="Choixtheme">
				<option value="space1">1</option>
				<option value="space2">2</option>
				<option value="space3">3</option>
			</select>
			<br><br>
			<input type="submit" name="Envoyer" Value="Sélectionner"/>
		</form>

		<br>
		

		<a id="button" href="connexion.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        MENU
    	</a>
		<br><br>
 <?php
	session_start();
	require "header.php";
?>

		<h1> Paramètres </h1>
		<br><br>
	</header>

	<p class="mention"> Paramètres du thème :</p>
	<br>


	<?php		
		if (isset($_COOKIE['theme'])){ 
			$style=$_COOKIE['theme'];	
		}
		else{
			$style="theme1";
		}
	?>
	<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

	<a><img id="img" src="images/theme1.png"></a>
	<a><img id="img" src="images/theme2.png"></a>
	<a><img id="img" src="images/theme3.png"></a>
	<br><br><br>

	
		<form method="post" action="themeappli.php">		
			<label class="mention">Choissisez votre thème préféré : </label>
			<select name="Choixtheme">
				<option value="theme1">1</option>
				<option value="theme2">2</option>
				<option value="theme3">3</option>
			</select>
			<br><br>
			<input type="submit" name="Envoyer" Value="Sélectionner"/>
		</form>

		<br>
		

		<div class="button"><a id="ca" href="jeu.php">Menu Principal</a></div>
		<br><br>

	<?php require 'footer.php'; ?>
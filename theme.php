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
			$style="space1";
		}
	?>
	<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>

	<a><img id="img" src="images/space1.png"></a>
	<a><img id="img" src="images/space2.png"></a>
	<a><img id="img" src="images/space3.png"></a>
	<br><br><br>

	
		<form method="post" action="themeappli.php">		
			<label class="mention">Choissisez votre thème préféré : </label>
			<select name="Choixtheme">
				<option value="space1">1</option>
				<option value="space2">2</option>
				<option value="space3">3</option>
			</select>
			<br><br>
			<input type="submit" name="Envoyer" Value="Sélectionner"/>
		</form>

		<br>
		

		<div class="button"><a id="ca" href="jeu.php">Menu Principal</a></div>
		<br><br>

	<?php require 'footer.php'; ?>
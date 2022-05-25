<?php  
    session_start();
    require "header.php";

    if(!isset($_SESSION["taille"])){

        echo '<legend class="input">Choisissez la taille de la grille :</legend>
    <form method="post" action="jeu.php">
        <input type="radio" name="taille" id="taille" value="4"/>
			<label for="4x4" class="input">4x4</label>
		<input type="radio" name="taille" id="taille" value="6"/>
			<label for="6x6" class="input">6x6</label>
        <input type="radio" name="taille" id="taille" value="8"/>
			<label for="8x8" class="input">8x8</label>    
        <input type="submit" name="Envoyer" Value="Envoyer"/>
    </form>';
        
    }
    else{
        header("jeu.php");
    }
    require "footer.php";
?>
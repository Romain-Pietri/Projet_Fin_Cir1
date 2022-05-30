<?php  
    session_start();
    require "header.php";

    if(isset($_SESSION["taille"])){
        header("Location: jeu.php");
    }
    else{
        echo '<legend class="input">Choisissez la taille de la grille :</legend>
    <form method="post" action="cookies.php">
        <input type="radio" name="taille" id="taille" value="4"/>
			<label for="4x4" class="input">4x4</label>
		<input type="radio" name="taille" id="taille" value="6"/>
			<label for="6x6" class="input">6x6</label>
        <input type="radio" name="taille" id="taille" value="8"/>
			<label for="8x8" class="input">8x8</label>    
        <input type="submit" name="Generate" Value="Generate"/>
    </form>';
    }
    require "footer.php";
?>
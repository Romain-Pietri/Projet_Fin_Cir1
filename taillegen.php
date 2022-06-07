<?php  
    session_start();
    require "header.php";

    if(!isset($_SESSION["taille2"]) || $_SESSION["taille2"] == 0){

        echo '<br><br><legend class="input"> Choose your grid size :</legend>
    <form method="post" action="cookies.php">
        <input type="radio" name="taille" id="taille" value="4"/>
			<legend for="4x4" class="input">4x4</legend>
		<input type="radio" name="taille" id="taille" value="6"/>
			<legend for="6x6" class="input">6x6</legend>
        <input type="radio" name="taille" id="taille" value="8"/>
			<legend for="8x8" class="input">8x8</legend>    
	<input type="submit" name="Manual_Create" Value="Create your grid"/>
    </form>';
        
    }
    else{
        header("Location:manuel.php");
    }
?>

<a href="taille.php"> Generate a grid randomly </a>
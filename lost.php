<?php
	session_start();
	unset($_SESSION["taille"]);
	require "header.php";
?>

<br><br><br>

<img id="title" src="images/gameover.gif">

<br><br>

<img src="images/failed.png" id="lost">
<br><br><br>
<a id="button" href="jeu.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        RESTART
    	</a>


<?php
    $_COOKIE["Ligne1"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne2"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne3"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne4"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne5"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne6"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne7"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne8"] = "[0,0,0,0,0,0,0,0]";
    require("save.php");
	require "footer.php";
?>


</body>
</html>
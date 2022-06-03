<?php
	session_start();
	session_destroy();
	require "header.php";
?>

<br><br><br>

<img id="title" src="images/gameover.gif">

<br><br>

<img src="images/failed.png" id="lost">

<a id="button" href="jeu.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        RESTART
    	</a>
<br><br>

<?php
	require "footer.php";
?>

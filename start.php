<?php
    session_start();

    require "header.php";
?>

<h1>Starship Invader</h1>
<br>

<img id="bulle" src="images/bulle.png">
<img id="gadget" src="images/gadget1.gif">

<?php
    if(isset($_SESSION["login"])){
        echo "<a href='jeu.php'><img id=start' src='images/start.png'></a>";
    }
    else{
        echo "<a href='connexion.php'><img id='start' src='images/start.png'></a>";
    }
?>


<br>

<?php require 'footer.php'; ?>
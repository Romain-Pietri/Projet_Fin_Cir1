<?php
    session_start();

    require "header.php";
?>

<h1>Starship<br>Invader</h1>

<p class="debut"><br><br>Hello young astronaut! I’m Captain Gadget <br> Welcome to Starship invader, our mission is to maintain the peace between us and the aliens helping them park their ships. <br>You will have more details in the parking rules. Let's start !<br><br><p>

<?php
    if(isset($_SESSION["login"])){
        echo'<a href="jeu.php"><img id="start" src="images/start.png"></a>';
    }
    else{
        echo'<a href="connexion.php"><img id="start" src="images/start.png"></a>';
    }
?>

<?php require 'footer.php'; ?>
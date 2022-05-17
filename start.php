<?php
    session_start();

    require "header.php";
?>


<p>Hello young astronaut! I’m Captain Gadget <br> Welcome to Starship invader, our mission is to maintain the peace between us and the aliens helping them park their ships. You will have more details in the parking rules. Let's start !<p>

<?php
    if(isset($_SESSION["login"])){
        echo'<a href="jeu.php"><img id="start" src="images/start.png"></a>';
    }
    else{
        echo'<a href="connexion.php"><img id="start" src="images/start.png"></a>';
    }
?>

<?php require 'footer.php'; ?>
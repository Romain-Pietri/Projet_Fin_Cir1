<?php
    session_start();

    require "header.php";
?>

<h1> Game Rules :</h1>
<br>

<br>
        
    </header>

<div class=regles>
    <p><br><br>Hello, the game's rules are simple :<br>
    There can't be more than 2 same symbols next to each other<br>
    There can't be 2 identical rows or 2 identical columns<br>
    Each row and each column have an identical number of each symbol
    <br><br>Your time to play !</p>
    <br><br><br>
    <img id="loupe" src="images/loupe.png">
    <br><br><br>
</div>

<?php require 'footer.php'; ?>
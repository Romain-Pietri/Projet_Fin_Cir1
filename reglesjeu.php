<?php
    session_start();

    require "header.php";
?>

<h1> Règles du jeu :</h1>
<br>

    <nav>
        <ul>
            <li><a href="score.php"> Scores </a></li>
            <li><a href="jeu.php"> Game </a></li>
        </ul>
    </nav>
<br>
        
    </header>

<div class=regles>
    <p><br><br>Bonjour, les règles du jeu sont simples :<br>
    Il ne peut y avoir plus de deux symboles identiques à côté<br>
    Il ne peut pas y avoir deux lignes identiques ni deux colonnes identiques<br>
    Chaque ligne et chaque colonne à un nombre identique de chaque symbole
    <br><br>A vous de jouer !</p>
    <br><br><br>
    <img id="loupe" src="images/loupe.png">
    <br><br><br>
</div>

<?php require 'footer.php'; ?>
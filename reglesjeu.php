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
    <p><br><br>Bonjour inspecteur, Comme vous le savez ce manoir contient le cadavre de Sophie Connor, 28 ans.<br>
    Votre mission, si toutefois vous l'acceptez, est de trouver le coupable de cet affreux crime.<br>
    Pour cela vous aurez accès aux numèros de tous les suspects pour les interroger sur leurs alibis et suspicion.<br>
    N'oubliez pas de fouiller le chalet grâce à votre loupe et votre pinceau à empreintes, les indices sont toujours une partie importante d'une enquète
    Nous avons réunis les dossiers de chaque suspects afin de mieux prèparer vos questions.
    <br><br>A vous de jouer inspecteur !</p>
    <br><br><br>
    <img id="loupe" src="images/loupe.png">
    <br><br><br>
</div>

<?php require 'footer.php'; ?>
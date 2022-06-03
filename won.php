<?php
    session_start();

    $taille=$_SESSION["taille"];
    require "header.php";
?>

<h1> Congratulations !</h1>
<img id="title" src="images/win.gif">

</header>
<main>
<?php
if($taille==4){
?>
<div>
<br>
<p>Congratulations ! You solved the grid, and now everyone is happy, youhou !</p>
<img id="dab" src="images/dab.gif">
<p> You can try to do the 6x6 and 8x8 grids, to get a better score and climb in the leaderboard !</p>
</div>

<?php
}
else if($taille==6){
?>
<div>
<br>
<p>Congratulations ! You solved the grid, and now everyone is happy, youhou !</p>
<img id="dab" src="images/dab.gif">
<p> You can try to do the 8x8 grid, to get a better score and climb in the leaderboard !</p>
</div>

<?php
}
else if($taille==8){
?>

<div>
<br>
<p>Congratulations ! You solved the biggest grid, and now everyone is happy, youhou !</p>
<img id="dab" src="images/dab.gif">
<p> You can try to do another one, to get a better score and climb in the leaderboard !</p>
</div>

<?php } ?>

<a id="button" href="jeu.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        RESTART
        </a>

<br><br><h2>.</h2><br><br>
    
<?php require "footer.php";?>
<?php
    session_start();

    require "header.php";
    $taille=$_SESSION["taille"];
    ?>

<h1> Congratulations !</h1>
</header>
<main>
<?php
if($taille==4){
?>
<div class="regles">
<br>
<br>
<p>Congratulations ! You solved the grid, and now everyone is happy, youhou !</p>
<br>
<img id="dab" src="images/dab.gif">
<br>
<p> You can try to do the 6x6 and 8x8 grids, to get a better score and appear in the leaderboard !</p>
<br>
</div>

<?php
}
else if($taille==6){
?>
<div class="regles">
<br>
<br>
<p>Congratulations ! You solved the grid, and now everyone is happy, youhou !</p>
<br>
<img id="dab" src="images/dab.gif">
<br>
<p> You can try to do the 8x8 grid, to get a better score and appear in the leaderboard !</p>
<br>
</div>

<?php
}
else if($taille==8){
?>

<div class="regles">
<br>
<br>
<p>Congratulations ! You solved the biggest grid, and now everyone is happy, youhou !</p>
<br>
<img id="dab" src="images/dab.gif">
<br>
<p> You can try to do it faster, to get a better score and appear in the leaderboard !</p>
<br>
</div>
</main>

<?php
}
    require "footer.php";
?>
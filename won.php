<?php
    session_start();

    
    $taille=$_SESSION["taille"];
    session_destroy();
    require "header.php";
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
<?php echo '<a href="taille.php"> New game </a>'; ?>
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
<?php echo '<a href="taille.php"> New game </a>'; ?>
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

<form class="formLetter" action="calculscore.php" method="post">
        <fieldset>
            <legend>Enregistrer le score</legend>
            <label>Pseudo</label>
            <input type="text" name="login" placeholder="test" required>
            <br>
            <input type="submit" name="valider" value="valider"/>
            <br>
        </fieldset>
     </form>
</main>
    
<?php
}

    require "footer.php";
?>
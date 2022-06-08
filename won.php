<?php
    session_start();
    $taille=$_SESSION["taille"];
    unset($_SESSION["taille"]);
    $login=$_SESSION["login"];
    $_SESSION["taille"] = 0;
    require "header.php";
    $_COOKIE["Ligne1"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne2"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne3"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne4"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne5"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne6"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne7"] = "[0,0,0,0,0,0,0,0]";
    $_COOKIE["Ligne8"] = "[0,0,0,0,0,0,0,0]";
    require("save.php");
    require("connexiondb.php");
    $request1="SELECT ID FROM utilisateurs WHERE login='$login'";
    $result=mysqli_query($connexion,$request1);
    if ( $result == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result);
    $id=$ligne["ID"];
?>

<h1> Congratulations !</h1>
<img id="title" src="images/win.gif">

</header>
<main>
<?php
if($taille==4){
    $request1="UPDATE utilisateurs SET NbGrille=NbGrille+1 WHERE login='$login'";
    $request2="SELECT NbGrille FROM utilisateurs WHERE login='$login'";
    $request3="UPDATE badge SET Badge1=Badge1+1 WHERE ID=$id";
    $request4="UPDATE utilisateurs SET Grille4=Grille4+1 WHERE login='$login'";
    $request5="SELECT Grille4 FROM utilisateurs WHERE login='$login'";
    $request6="UPDATE badge SET Badge3=Badge3+1 WHERE ID=$id";
    $request7="UPDATE badge SET Badge7=Badge7+1 WHERE ID=$id";
    $result1=mysqli_query($connexion,$request1);
    $result2=mysqli_query($connexion,$request2);
    if ( $result2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result2);
    if($ligne["NbGrille"]>=1){
        $result3=mysqli_query($connexion,$request3);
    }
    if($ligne["NbGrille"]>=5){
        $result7=mysqli_query($connexion,$request7);
    }
    $result4=mysqli_query($connexion,$request4);
    $result5=mysqli_query($connexion,$request5);
    if ( $result5 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result5);
    if($ligne["Grille4"]>=3){
        $result6=mysqli_query($connexion,$request6);
    }
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
    $request1="UPDATE utilisateurs SET NbGrille=NbGrille+1 WHERE login='$login'";
    $request2="SELECT NbGrille FROM utilisateurs WHERE login='$login'";
    $request3="UPDATE badge SET Badge1=Badge1+1 WHERE ID=$id";
    $request4="UPDATE utilisateurs SET Grille6=Grille6+1 WHERE login='$login'";
    $request5="SELECT Grille6 FROM utilisateurs WHERE login='$login'";
    $request6="UPDATE badge SET Badge4=Badge4+1 WHERE ID=$id";
    $request7="UPDATE badge SET Badge7=Badge7+1 WHERE ID=$id";
    $result1=mysqli_query($connexion,$request1);
    $result2=mysqli_query($connexion,$request2);
    if ( $result2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result2);
    if($ligne["NbGrille"]>=1){
        $result3=mysqli_query($connexion,$request3);
    }
    if($ligne["NbGrille"]>=5){
        $result7=mysqli_query($connexion,$request7);
    }
    $result4=mysqli_query($connexion,$request4);
    $result5=mysqli_query($connexion,$request5);
    if ( $result5 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result5);
    if($ligne["Grille6"]>=3){
        $result6=mysqli_query($connexion,$request6);
    }
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
    $request1="UPDATE utilisateurs SET NbGrille=NbGrille+1 WHERE login='$login'";
    $request2="SELECT NbGrille FROM utilisateurs WHERE login='$login'";
    $request3="UPDATE badge SET Badge1=Badge1+1 WHERE ID=$id";
    $request4="UPDATE utilisateurs SET Grille8=Grille8+1 WHERE login='$login'";
    $request5="SELECT Grille8 FROM utilisateurs WHERE login='$login'";
    $request6="UPDATE badge SET Badge5=Badge5+1 WHERE ID=$id";
    $request7="UPDATE badge SET Badge7=Badge7+1 WHERE ID=$id";
    $result1=mysqli_query($connexion,$request1);
    $result2=mysqli_query($connexion,$request2);
    if ( $result2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result2);
    if($ligne["NbGrille"]>=1){
        $result3=mysqli_query($connexion,$request3);
    }
    if($ligne["NbGrille"]>=5){
        $result7=mysqli_query($connexion,$request7);
    }
    $result4=mysqli_query($connexion,$request4);
    $result5=mysqli_query($connexion,$request5);
    if ( $result5 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result5);
    if($ligne["Grille8"]>=3){
        $result6=mysqli_query($connexion,$request6);
    }
?>

<div>
<br>
<p>Congratulations ! You solved the biggest grid, and now everyone is happy, youhou !</p>
<img id="dab" src="images/dab.gif">
<p> You can try to do another one, to get a better score and climb in the leaderboard !</p>
</div>

<?php } ?>

<a id="button" href="taille.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        RESTART
        </a>

<br><br><h2>.</h2><br><br>
    
<?php
    require "footer.php";?>

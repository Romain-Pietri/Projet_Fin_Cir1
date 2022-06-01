<?php
    session_start();
    require("connexiondb.php");


if ($_SESSION['taille'] == 4){
    $taille = 400;
    $money=1000;
}
if ($_SESSION['taille'] == 6){
    $taille = 1000;
    $money=2000;
}
if ($_SESSION['taille'] == 8){
    $taille = 1600;
    $money=3000;
}
$login = $_SESSION['login'];



if(isset($_POST["valider"])){
        
    $requete="SELECT Indice FROM utilisateurs WHERE login='$login'";
    $requete2="SELECT Moula FROM utilisateurs WHERE login='$login";
    $exe=mysqli_query($connexion,$requete);
    $return=mysqli_fetch_assoc($exe);
    if ( $return == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($return);
    $indice=$ligne['Indice'];
    $startindice=$_SESSION["indice"];
    $hintuse=$startindice-$indice;
    
    $exe2=mysqli_query($connexion,$requete2);
    $return2=mysqli_fetch_assoc($exe2);
    if ( $return2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($return2);
    $moula=$ligne['Moula'];
    $moula=$moula+$money;
    $requete3="UPDATE Moula FROM utilisateurs WHERE login='$login'";
    $exe3=mysqli_query($connexion,$requete3);
    $return3=mysqli_fetch_assoc($exe3);
    if ( $return3== FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }



        $request1="SELECT Score FROM utilisateurs WHERE login = '$login'";
        $resultat1=mysqli_query($connexion,$request1);
        if ( $resultat1 == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }
        $result=mysqli_fetch_assoc($resultat1);

        $score = $result['Score'] + $taille - 100*$hintuse;
        echo $score;
        
        $request="UPDATE utilisateurs SET Score = '$score' WHERE login = '$login'";
        $resultat=mysqli_query($connexion,$request);
        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }
        mysqli_close($connexion);
        header("Location:score.php");
        }

?>
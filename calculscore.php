<?php
    session_start();



if ($_SESSION['taille'] == 4){
    $taille = 400;
}
if ($_SESSION['taille'] == 6){
    $taille = 1000;
}
if ($_SESSION['taille'] == 8){
    $taille = 1600;
}

$indice = $_SESSION['indice'];
$login = $_SESSION['login'];


if(isset($_POST["valider"])){
        
        require("connexiondb.php");

        $request1="SELECT Score FROM utilisateurs WHERE login = '$login'";
        $resultat1=mysqli_query($connexion,$request1);
        if ( $resultat1 == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }
        $result=mysqli_fetch_assoc($resultat1);

        $score = $result['Score'] + $taille - 100*$indice;
        echo $score;
        
        $request="UPDATE utilisateurs SET Score = '$score' WHERE login = '$login'";
        $resultat=mysqli_query($connexion,$request);
        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }
        mysqli_close($connexion);
        header("Location:jeu.php");
        }

?>
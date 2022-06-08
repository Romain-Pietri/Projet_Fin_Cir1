<?php
    session_start();
    require("connexiondb.php");
    

if ($_SESSION['taille'] == 4){
    $taille = 400;
    $money=10;
}
if ($_SESSION['taille'] == 6){
    $taille = 1000;
    $money=30;
}
if ($_SESSION['taille'] == 8){
    $taille = 1600;
    $money=50;
}
$login = $_SESSION["login"];
$request1 = "SELECT ID FROM utilisateurs WHERE login = '$login'";
$result=mysqli_query($connexion,$request1);
if ( $result == FALSE ){
    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
    die();
}
while($ligne=mysqli_fetch_assoc($result)){
    $id=$ligne["ID"];
}



        
    $requete="SELECT Indice FROM utilisateurs WHERE login='$login'";
    $requete2="SELECT Moula FROM utilisateurs WHERE login='$login'";
    $exe=mysqli_query($connexion,$requete);
    if ( $exe == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($exe);
    $indice=$ligne['Indice'];
    $startindice=$_SESSION["hint"];
    $hintuse=$startindice-$indice;
    $_SESSION["hint"]=$indice;
    
    $exe2=mysqli_query($connexion,$requete2);
    if ( $exe2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($exe2);
    $moula=$ligne['Moula'];
    $moula=$moula+$money;
    $requete3="UPDATE utilisateurs SET Moula=$moula WHERE login='$login'";
    $exe3=mysqli_query($connexion,$requete3);
    
    if ( $exe3== FALSE ){
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
        if(isset($_SESSION["Solvetrue"]) || $taille - 100*$hintuse<0){
            $score=$result['Score'];
        }
        if ($score>=10000){
            $request="UPDATE badge SET Badge6=Badge6+1 WHERE ID=$id";
            $result=mysqli_query($connexion,$request);
            if ( $result == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
            
        }
        $request="UPDATE utilisateurs SET Score = $score WHERE login = '$login'";
        $resultat=mysqli_query($connexion,$request);
        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }
        mysqli_close($connexion);
        header("Location:won.php");

?>
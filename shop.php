<?php
    session_start();

    require "header.php";
    require("connexiondb.php");
    if(!isset($_SESSION["login"])){
        header("Location:connexion.php");
    }
?>

<body>
<div>
<h1> 1 Indice </h1>
<form action="" method="post">
<input type="submit" name="one" value="ACHETER: 10$">
</form>
</div>

<div>
<h1> 5 Indices </h1>
<form action="" method="post">
<input type="submit" name="five" value="ACHETER:50$">
</form>
</div>

<div>
<h1> 10 Indices </h1>
<form action="" method="post">
<input type="submit" name="ten" value="ACHETER:100$">
</form>
</div>

<?php
if(isset($_POST['one'])){
    $login=$_SESSION['login'];
    $request="SELECT Moula FROM utilisateurs WHERE login='$login'";
    $request2="UPDATE utilisateurs SET Indice=Indice+1 WHERE login='$login'";
    $request3="UPDATE utilisateurs SET Moula=Moula-10 WHERE login='$login'";
    $exe=mysqli_query($connexion,$request);
    if ( $exe == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $return=mysqli_fetch_assoc($exe);


    if ($return['Moula']>=10){
    $exe2=mysqli_query($connexion,$request2);
    if ( $exe2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $exe3=mysqli_query($connexion,$request3);
    if ( $exe3 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    }   
    mysqli_close($connexion);

}

if(isset($_POST['five'])){
    $login=$_SESSION['login'];
    $request="SELECT Moula FROM utilisateurs WHERE login='$login'";
    $request2="UPDATE utilisateurs SET Indice=Indice+5 WHERE login='$login'";
    $request3="UPDATE utilisateurs SET Moula=Moula-50 WHERE login='$login'";
    $exe=mysqli_query($connexion,$request);
    if ( $exe == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $return=mysqli_fetch_assoc($exe);


    if ($return['Moula']>=50){
    $exe2=mysqli_query($connexion,$request2);
    if ( $exe2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $exe3=mysqli_query($connexion,$request3);
    if ( $exe3 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    }   
    mysqli_close($connexion);

}

if(isset($_POST['ten'])){
    $login=$_SESSION['login'];
    $request="SELECT Moula FROM utilisateurs WHERE login='$login'";
    $request2="UPDATE utilisateurs SET Indice=Indice+10 WHERE login='$login'";
    $request3="UPDATE utilisateurs SET Moula=Moula-100 WHERE login='$login'";
    $exe=mysqli_query($connexion,$request);
    if ( $exe == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $return=mysqli_fetch_assoc($exe);


    if ($return['Moula']>=100){
    $exe2=mysqli_query($connexion,$request2);
    if ( $exe2 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $exe3=mysqli_query($connexion,$request3);
    if ( $exe3 == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    }   
    mysqli_close($connexion);

}
?>
</body>
<footer>

</footer>
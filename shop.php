<?php
    session_start();

    require "header.php";
    require("connexiondb.php");
?>

<body>
<div>
<h1> 1 Indice </h1>
<form action="" method="post">
<input type="submit" name="one" value="ACHETER">
</form>
</div>

<div>
<h1> 5 Indices </h1>
<form action="" method="post">
<input type="submit" name="five" value="ACHETER">
</form>
</div>

<div>
<h1> 10 Indices </h1>
<form action="" method="post">
<input type="submit" name="ten" value="ACHETER">
</form>
</div>
<?php
if(isset($_POST['one'])){
    $login=$_SESSION['login'];
    $request="SELECT Moula FROM utilisateurs WHERE login='$login'";
    $request2="UPDATE utilisateurs SET Indice=Indice+1 WHERE login='$login'";
    $exe=mysqli_query($connexion,$request);
    $return=mysqli_fetch_assoc($exe);
    if ( $return == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    if ($ligne['Moula']>2000){
    $exe2=mysqli_query($connexion,$request2);
    $return2=mysqli_fetch_assoc($exe2);
    if ( $return2 == FALSE ){
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
    $exe=mysqli_query($connexion,$request);
    $return=mysqli_fetch_assoc($exe);
    if ( $return == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    if ($ligne['Moula']>10000){
    $exe2=mysqli_query($connexion,$request2);
    $return2=mysqli_fetch_assoc($exe2);
    if ( $return2 == FALSE ){
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
    $exe=mysqli_query($connexion,$request);
    $return=mysqli_fetch_assoc($exe);
    if ( $return == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    if ($ligne['Moula']>20000){
    $exe2=mysqli_query($connexion,$request2);
    $return2=mysqli_fetch_assoc($exe2);
    if ( $return2 == FALSE ){
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
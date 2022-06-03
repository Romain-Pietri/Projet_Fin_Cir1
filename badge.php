<?php
session_start();
$login=$_SESSION['login'];
require("connexiondb.php");
require("header.php");
?>

<h1> Votre collection de badges </h1>

<?php 
for ($i=1;$i<=8;$i++){
switch($i){
    case 1:
        $text="Badge 1";
        break;
    case 2:
        $text="Badge 2";
        break;
    case 3:
        $text="Badge 3";
        break;
    case 4:
        $text="Badge 4";
        break;
    case 5:
        $text="Badge 5";
        break;
    case 6:
        $text="Badge 6";
        break;
    case 7:
        $text="Badge 7";
        break;
    case 8:
        $text="Badge 8";
        break;
}
$request="SELECT Badge$i FROM utilisateurs WHERE login='$login'";
$result=mysqli_query($connexion,$request);
if ( $result == FALSE ){
    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
    die();
}
while($ligne=mysqli_fetch_assoc($result)){
    if($ligne["Badge$i"]==0){
        echo"test 0";
    }
    if($ligne["Badge$i"]==1){
        echo"test 1";
    }
?>
<div>
<p> <?php echo"$text"?></p>
<img src="images/dab.gif">
</div>

<?php
}
}


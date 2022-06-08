<?php
session_start();
$login=$_SESSION['login'];
require("connexiondb.php");
require("header.php");
?>

<h1> Votre collection de badges </h1>

<?php 
$request1="SELECT ID FROM utilisateurs WHERE login='$login'";
$result=mysqli_query($connexion,$request1);
if ( $result == FALSE ){
    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
    die();
}
$ligne=mysqli_fetch_assoc($result);
$id=$ligne["ID"];
for ($i=1;$i<=10;$i++){
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
    case 9:
        $text="Badge 9";
        break;
    case 10:
        $text="Badge 10";
        break;
}
$request="SELECT Badge$i FROM badge WHERE ID=$id";
$result=mysqli_query($connexion,$request);
if ( $result == FALSE ){
    echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
    die();
}
while($ligne=mysqli_fetch_assoc($result)){
    if($ligne["Badge$i"]==0){
        $image="nobadge$i";
    }
    if($ligne["Badge$i"]>=1){
        $image="yesbadge$i";
    }
?>
<div>
<p> <?php echo"$text"?></p>
<img src="images/<?php echo $image?>.png">
</div>

<?php
}
}?>
</body>
</html>


<?php
session_start();
$login=$_SESSION['login'];
require("connexiondb.php");
require("header.php");
?>

<h1> Your badges collection </h1>

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
        $text="1 grid solved";
        break;
    case 2:
        $text="1 grid created";
        break;
    case 3:
        $text="3 solved 4x4 grids";
        break;
    case 4:
        $text="3 solved 6x6 grids";
        break;
    case 5:
        $text="3 solved 8x8 grids";
        break;
    case 6:
        $text="Score over 9000 !";
        break;
    case 7:
        $text="5 grids solved";
        break;
    case 8:
        $text="3rd place on the leaderboard reached !";
        break;
    case 9:
        $text="2nd place on the leaderboard reached !";
        break;
    case 10:
        $text="You are at the top ! Cheer !";
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
        if($i==1||$i==2||$i==3){
            $image="nobadge123";
        }
        else if($i==5||$i==6){
            $image="nobadge56";
        }
        else if($i==7||$i==8){
            $image="nobadge78";
        }
        else{
            $image="nobadge$i";
        }
    }
    if($ligne["Badge$i"]>=1){
        $image="yesbadge$i";
    }
?>
<div>
<p> <?php echo"$text"?></p>
<img id="badges" src="images/<?php echo $image?>.png">
</div>

<?php
}
}?>
</body>
</html>


<?php
require("connexiondb.php");
session_start();
if(isset($_COOKIE['id'])){

    if(($_COOKIE['id']) == 0){
        $request = "DELETE FROM grilles";
        $exe=mysqli_query($connexion,$request);
        if( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :" . mysql_error($connexion) . "</p>" ;
                die();
        }
        generator();
    }

    if(($_COOKIE['id']) == 1){
        verif();
    }

    if(($_COOKIE['id']) == 2){
        indice();
    }

    if(($_COOKIE['id']) == 3){
        solver();
    }

    if(($_COOKIE['id']) == 4){
        verifgen();
    }
    
}
else{
    echo "le cookie n'existe pas";
}
function generator(){
        require("connexiondb.php");
        $json=file_get_contents("json.json");
        $data=json_decode($json);
        $data->tableau=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
        $data->length=$_SESSION["taille"];
        $data->request=0;
        $data->id=0;
        $data->verif=0;
        
        $edata=json_encode($data, false);

        file_put_contents("json.json",$edata);
    do{
        echo exec("Programme.exe");
        sleep(1);
        $json=file_get_contents("json.json");
        $data=json_decode($json);
    }while ($data->verif==0) ;

    $tab=$data->tableau;//envoyer tableau dans BD
    $id=1;
    for ($i=0;$i<8;$i++){
        $seri=json_encode($tab[$i]);
        $request = "INSERT INTO grilles (Ligne,ID) VALUES ('$seri',$id)";
        $exe = mysqli_query($connexion,$request);
        if( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :" . mysql_error($connexion) . "</p>" ;
                die(); 
        }
        $id = $id + 1;
    }

    if(isset($_SESSION["indice"])){
		unset($_SESSION["indice"]);
    }

    mysqli_close($connexion);
    header("Location:jeu.php");
}

function verif(){
    require("connexiondb.php");
    require("pulldb.php");
    $json=file_get_contents('json.json');
    $data=json_decode($json);
    $data->tableau= $tab;
    $data->length=$_SESSION["taille"];
    $data->request=0;
    $data->id=3;
    $data->verif=0;
    
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programme.exe");
    sleep(2);
    $json=file_get_contents('json.json');
    $data=json_decode($json);
    if($data->verif == 1){
        header("location:calculscore.php");
    }
    else{
        header("location:lost.php");
    }
}

function indice(){
    require("connexiondb.php");
    $array1 = "[0,0,0,0,0,0,0,0]";
	$array2 = "[0,0,0,0,0,0,0,0]";
	$array3 = "[0,0,0,0,0,0,0,0]";
	$array4 = "[0,0,0,0,0,0,0,0]";
	$array5 = "[0,0,0,0,0,0,0,0]";
	$array6 = "[0,0,0,0,0,0,0,0]";
	$array7 = "[0,0,0,0,0,0,0,0]";
	$array8 = "[0,0,0,0,0,0,0,0]";
    require("pulldb.php");
    $json=file_get_contents('json.json');
    $data=json_decode($json);
    $data->tableau = $tab;
    $data->length=$_SESSION["taille"];
    $data->request=0;
    $data->id=2;
    $data->verif=0;

    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programme.exe");
    sleep(2);
    $json=file_get_contents('json.json');
    $data=json_decode($json);

    $indicetab = $data->tableau;
    $indiceset = 0;
    for($x = 1; $x <= 8; $x++) {
		for($y = 1; $y <= 8; $y++){
			if($tab[$x - 1][$y - 1] != $indicetab[$x - 1][$y - 1] && $indiceset == 0){
                if(isset($_SESSION["indice"])){
                    unset($_SESSION["indice"]);
                }
                $_SESSION["indice"] = "$x$y";
                $indiceset = 1;
			}					
		}
	}
    if($indiceset == 0){
        if(isset($_SESSION["indice"])){
            unset($_SESSION["indice"]);
        }
        $_SESSION["indice"] = "suppo";
    }
    header("location:jeu.php");
}

function solver(){
    require("connexiondb.php");
    $json=file_get_contents('json.json');
    $data=json_decode($json);

    require("pull_initial_array.php");
    $data->tableau= $initial_array;
    $data->length=$_SESSION["taille"];
    $data->request=0;
    $data->id=1;
    $data->verif=0;
    
    $request = "DELETE FROM grilles";
    $exe=mysqli_query($connexion,$request);
    if( $exe == FALSE ){
            echo "<p>Erreur d'exécution de la requete :" . mysql_error($connexion) . "</p>" ;
            die();
    }



    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programme.exe");
    sleep(2);
    $json=file_get_contents('json.json');
    $data=json_decode($json);
    if($data->request==1){
        $tab=$data->tableau;//envoyer tableau dans BD
        $id=1;
        for ($i=0;$i<8;$i++){
            $seri=json_encode($tab[$i]);
            $request = "INSERT INTO grilles (Ligne,ID) VALUES ('$seri',$id)";
            $exe = mysqli_query($connexion,$request);
            if( $exe == FALSE ){
                    echo "<p>Erreur d'exécution de la requete :" . mysql_error($connexion) . "</p>" ;
                    die(); 
            }
            $id = $id + 1;
        }
        mysqli_close($connexion);
        if($data->verif==0){
            $_SESSION["erreur"] = 1;
        }
    }   



    
    header("Location:jeu.php");
}


function verifgen(){
    require("connexiondb.php");
    $json=file_get_contents('json.json');
    $data=json_decode($json);
    require("pull_initial_array.php");
    $data->tableau= $initial_array;
    $data->length=$_SESSION["taille2"];
    $data->request=0;
    $data->id=4;
    $data->verif=0;
    
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programme.exe");
    sleep(2);
    $json=file_get_contents('json.json');
    $data=json_decode($json);
    
    if($data->verif==1){
        $_SESSION["taille"] = $_SESSION["taille2"];
        unset($_SESSION["taille2"]);


        //requete de raph
        $login=$_SESSION["login"];
        $request1="SELECT ID FROM utilisateurs WHERE login='$login'";
        $result=mysqli_query($connexion,$request1);
        if ( $result == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysql_error($connexion)."</p>" ;
            die();
        }
        $ligne=mysqli_fetch_assoc($result);
        $id=$ligne["ID"];
        $request="UPDATE utilisateurs SET ManuGrille=ManuGrille+1 WHERE login='$login'";
        $request2="SELECT ManuGrille FROM utilisateurs";
        $request3="UPDATE badge SET Badge2=Badge2+1 WHERE ID='$id'";
        $result=mysqli_query($connexion,$request);
        if( $result == FALSE ){
            echo "<p>Erreur d'exécution de la requete :" . mysql_error($connexion) . "</p>" ;
            die();
        }
        $result2=mysqli_query($connexion,$request2);
        while($ligne=mysqli_fetch_assoc($result2)){
            if($ligne["ManuGrille"]>=1){
                $result3=mysqli_query($connexion,$request3);
                if( $result3 == FALSE ){
                    echo "<p>Erreur d'exécution de la requete :" . mysql_error($connexion) . "</p>" ;
                    die();
                }
            }
        }

        header("location:jeu.php");
    }
    else{
        $_SESSION["solvable"] = 0;
        mysqli_close($connexion);
        header("location:manuel.php");
    }
}
?>


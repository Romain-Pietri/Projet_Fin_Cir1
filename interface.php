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
        sleep(4);
        $json=file_get_contents("json.json");
        $data=json_decode($json);
    }while ($data->verif==0) ;

    $tab=$data->tableau;//envoyer tableau dans BD
    $id=1;
    for ($i=0;$i<8;$i++){
        $seri=serialize($tab[$i]);
        $request = "INSERT INTO grilles (Ligne,ID) VALUES ('$seri',$id)";
        $exe = mysqli_query($connexion,$request);
        if( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :" . mysqli_error($connexion) . "</p>" ;
                die(); 
        }
        $id = $id + 1;
    }
    mysqli_close($connexion);
    header("Location:jeu.php");
}

function verif(){
    require("connexiondb.php");
    require("pulldb.php");
    $json=file_get_contents('Programmes-/json.json');
    $data=json_decode($json);
    $data->tableau= $tab;
    $data->length=$_SESSION["taille"];
    $data->request=0;
    $data->id=1;
    $data->verif=0;
    
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(2);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    if($data->verif==1){
        header("location:won.php");
    }
    else{
        header("location:lost.php");
    }
}

function indice(){
    require("connexiondb.php");
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=2;
    $data->verif=0;
    $data->length=$_SESSION["taille"];
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(2);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    header("location:jeu.php");
}

function solver(){
    require("connexiondb.php");
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=3;
    $data->verif=0;
    $data->length=$_SESSION["taille"];
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(2);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    if($data->verif==1){
        //faisable => envoyer tableau dans BD
    }
    else{
        //pas faisable
    }
}

function verifgen(){
    require("connexiondb.php");
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=4;
    $data->verif=0;
    $data->length=$_SESSION["taille"];
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(2);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    if($data->verif==1){
        header("location:won.php");
    }
    else{
        header("location:lost.php");
    }
}
?>

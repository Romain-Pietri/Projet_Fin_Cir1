<?php
require("connexiondb.php");
if(isset($_COOKIE['id'])){
    if($_COOKIE['id']==0){
        generator();
    }
    if($_COOKIE['id']==1){
        verif();
    }
    if($_COOKIE['id']==2){
        indice();
    }
    if($_COOKIE['id']==3){
        solver();
    }
    if($_COOKIE['id']==4){
        verifgen();
    }
    
}
else{
    echo "le cookie n'existe pas";
}
function generator(){
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=0;
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(6);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $tab=$data->tableau;//envoyer tableau dans BD
    $id=1;
    $request="DELETE FROM grilles";
    $exe=mysqli_query($connexion,$request);
        if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
        }
    for ($i=0;$i<8;$i++){
        $seri=serialize($tab[$i]);
        $request="INSERT INTO grilles (Ligne,ID) VALUES ('$seri','$id')";
        $exe=mysqli_query($connexion,$request);
        if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
        }
        $id=$id+1;
    }
    mysqli_close($connexion);
}

function verif(){
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=1;
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(6);
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
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=2;
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(6);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    header("location:jeu.php");
}

function solver(){
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=3;
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(6);
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
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    $data->id=4;
    $edata=json_encode($data, false);
    file_put_contents("json.json",$edata);
    echo exec("Programmes-C/StarshipInvader/Programme.exe");
    sleep(6);
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
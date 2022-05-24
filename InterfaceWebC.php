<?php

function generator(){
    echo exec("C:/MAMP/htdocs/Projet de fin d'année/Programmes-C/StarshipInvader/Programme.exe");
    sleep(6);
    $json=file_get_contents('Programmes-C/json.json');
    $data=json_decode($json);
    echo $data->request;
}
generator();
?>
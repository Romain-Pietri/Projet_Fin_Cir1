<?php
require("connexiondb.php");

        $json = file_get_contents('json.json'); //récupérer le contenu du fichier
        $data = json_decode($json, false); //"traduire" du json à des variables php
        $tab = $data->tableau; //enregistrer les variables de $data dans d'autres variables php 
        /*$edata=json_encode($data, false); //encoder les variables sous forme json
        file_put_contents("json.json",$edata); //changer le contenu du fichier*/
        $request="INSERT"

?>
<?php
require("connexiondb.php");

        $json = file_get_contents("Programmes-C/json.json"); //récupérer le contenu du fichier
        $data = json_decode($json, false); //"traduire" du json à des variables php
        $tab = $data->tableau; //enregistrer les variables de $data dans d'autres variables php 
        $id=1;
        /*$edata=json_encode($data, false); //encoder les variables sous forme json
        file_put_contents("json.json",$edata); //changer le contenu du fichier*/
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
        
        
        

?>
<?php
    session_start();

    require "header.php";
    ?>
    <style>
        .input{
            color : white;
        }

        table {

        }
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
            
        th,
        td {
            text-align: center;
            width : 100px;
            height : 100px;
        }
          
        table#t01 tr {
            background-color: #eee;
            color : black;
        }
          
          
        table#t01 th {
            background-color: black;
            color: white;
        }
        
        .boutonjeu{
            color : black;
            height : 100%;
            width : 100%;
        }

        .img{
            height : 100%;
            width : 100%;
        }
    </style>
</header>
<body>
<?php
        require("connexiondb.php");

			$requete="SELECT * FROM ";//La requere SQL
			$resultat = mysqli_query($connexion,$requete); //Executer la requete
			
			if ( $resultat == FALSE ){
				echo "<p>Erreur d'ex�cution de la requete :".mysqli_error($connexion)."</p>" ;
				die();
			}
			else
			{
				$nbreLignes= ...; //Nombre de ligne du retour de la requete
				
				echo "Le Nombre des adh�rents est : $nbreLignes <br>";
				
				//lire le tableau des resulats ligne par ligne
				if(...>0){
					while(...){
						foreach ($UneLigne as ..) {
							echo  "...";
						}
					}
				}
				else
					echo "aucune ligne";
				
				die();//Fermer la connexion
			}

    if(!isset($_POST["Envoyer"])){
        echo '<legend class="input">Choisissez la taille de la grille :</legend>
    <form method="post" action="jeu.php">
        <input type="radio" name="taille" id="taille" value="4"/>
			<label for="4x4" class="input">4x4</label>
		<input type="radio" name="taille" id="taille" value="6"/>
			<label for="6x6" class="input">6x6</label>
        <input type="radio" name="taille" id="taille" value="8"/>
			<label for="8x8" class="input">8x8</label>    
        <input type="submit" name="Envoyer" Value="Envoyer"/>
    </form>';
        
    }
    else {
        $taille = $_POST["taille"];
    
     $initial_array1 = [0,0,0,0,0,0,0,0];
     $initial_array = [$initial_array1,$initial_array1,$initial_array1,$initial_array1,$initial_array1,$initial_array1,$initial_array1,$initial_array1];

?>

    <div id ="container">
            
        
        <table id="t01">
        
            
            <?php
            $contenu = [];

            for ($j = 1; $j <= $taille; $j++) { 
                echo '<tr>';    
                for ($k = 1; $k <= $taille; $k++) {
                
                echo "<td> ";
                echo "<button class = 'boutonjeu' onclick = 'modifValeurs($j, $k)' type='button'> <img class='img' id= '$j$k' src = #> </button>";

                echo " </td> " ; 
                }
                echo "</tr>" ;
                
            }
            
            ?>
            
            <form method = "post" action = "verfi">
                <input type = "submit" name="Verifier "
            </form>
            <input type = "hidden" id="variable" value = <?php echo $taille ?> />

            
         <script>
            var initial_array1 = <?php echo '["' . implode('", "', $initial_array1) . '"]'; ?>;
            var initial_array2 = <?php echo '["' . implode('", "', $initial_array2) . '"]'; ?>;
            var initial_array3 = <?php echo '["' . implode('", "', $initial_array3) . '"]'; ?>;
            var initial_array4 = <?php echo '["' . implode('", "', $initial_array4) . '"]'; ?>;
            var initial_array5 = <?php echo '["' . implode('", "', $initial_array5) . '"]'; ?>;
            var initial_array6 = <?php echo '["' . implode('", "', $initial_array6) . '"]'; ?>;
            var initial_array7 = <?php echo '["' . implode('", "', $initial_array7) . '"]'; ?>;
            var initial_array8 = <?php echo '["' . implode('", "', $initial_array8) . '"]'; ?>;
            var initial_array = [initial_array1, initial_array2, initial_array3, initial_array4, initial_array5, initial_array6, initial_array7, initial_array8];
            var initial_array = [[0,0,0,0,2,0,0,0],[0,0,0,0,1,0,0,0],[0,0,0,0,2,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,1,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[2,0,0,0,0,0,1,0]];
            var taille = document.getElementById("variable").value;
            var contenu = [[0,0,0,0,2,0,0,0],[0,0,0,0,1,0,0,0],[0,0,0,0,2,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,1,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[2,0,0,0,0,0,1,0]];
            
            function modifValeurs(x, y) {

                let n = contenu[x-1][y-1];
                n = (n + 1) % 3;
                if (initial_array[x-1][y-1] == 1) {
                    n = 1;
                }
                if (initial_array[x-1][y-1] == 2) {
                    n = 2;
                }
                contenu[x-1][y-1] = n;
                z = x*10 + y;
                if (n == 1) {
                    document.getElementById(z).src = "images/img1.png";
                }
                if (n == 2) {
                    document.getElementById(z).src = "images/img2.png";
                }
                if (n == 0) {
                    document.getElementById(z).src = "images/img0.png";
                }
                console.log(contenu);
            }

            function afficher(size) {
                for (let x = 1; x <= size; x++){
                    for (let y = 1; y <= size; y++){
                        let n = contenu[x-1][y-1];
                        contenu[x-1][y-1] = n;
                        z = x*10 + y;
                        if (n == 1) {
                            document.getElementById(z).src = "images/img1.png";
                        }
                        if (n == 2) {
                            document.getElementById(z).src = "images/img2.png";
                        }
                        if (n == 0) {
                            document.getElementById(z).src = "images/img0.png";
                        }   
                    }
                }
                console.log("cactus");
            }
            
            afficher(<?php echo $taille ?>);
        </script>
    </div>

</body>
<?php } require 'footer.php'; ?>

</html>

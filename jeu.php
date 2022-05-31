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
            width : 75px;
            height : 75px;
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
    
	
    if(!isset($_SESSION["taille"])){
        header("Location: taille.php");
    }
    else{
    $taille = $_SESSION["taille"];
    
    require("connexiondb.php");
	    
	$requete="SELECT Ligne FROM grilles WHERE ID = 1 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array1 = unserialize($UneLigne["Ligne"]);        
		}
	}
		$requete="SELECT Ligne FROM grilles WHERE ID = 2 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array2 = unserialize($UneLigne["Ligne"]);        
		}
	}

	$requete="SELECT Ligne FROM grilles WHERE ID = 3 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array3 = unserialize($UneLigne["Ligne"]);        
		}
	}

	$requete="SELECT Ligne FROM grilles WHERE ID = 4 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array4 = unserialize($UneLigne["Ligne"]);        
		}
	}
	$requete="SELECT Ligne FROM grilles WHERE ID = 5 ";
	$resultat = mysqli_query($connexion,$requete);
			
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array5 = unserialize($UneLigne["Ligne"]);        
		}
	}

	$requete="SELECT Ligne FROM grilles WHERE ID = 6 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array6 = unserialize($UneLigne["Ligne"]);        
		}
	}
	$requete="SELECT Ligne FROM grilles WHERE ID = 7 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array7 = unserialize($UneLigne["Ligne"]);        
		}
	}
	$requete="SELECT Ligne FROM grilles WHERE ID = 8 ";
	$resultat = mysqli_query($connexion,$requete);
		
	if ( $resultat == FALSE ){
		echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}
	else
	{
		while($UneLigne = mysqli_fetch_assoc($resultat)){
			$initial_array8 = unserialize($UneLigne["Ligne"]);        
		}
	}
	//$initial_array = [$initial_array1,$initial_array2,$initial_array3,$initial_array4,$initial_array5,$initial_array6,$initial_array7,$initial_array8];
	$initial_array = [[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]]
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

            <?php

			   $login=$_SESSION['login'];
	           require("connexiondb.php");
			
				$request="SELECT Indice,Moula FROM utilisateurs WHERE login='$login'";
				$resultat=mysqli_query($connexion,$request);
				if ( $resultat == FALSE ){
								echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
								die();
							}
				$indice=mysqli_fetch_assoc($resultat);
				$hint=$indice['Indice'];
				mysqli_close($connexion);
            ?>
            
            <form method="post" action = "cookies.php">
                <input type="submit" name="Verify" Value="Verify"/>
                <input type="submit" name="Hint" Value="🔍 <?php echo $hint; ?>"/>
                <input type="submit" name="Solve" Value="Solve"/>
            </form>
            <input type = "hidden" id="variable" value = <?php echo $taille ?> />


            
         <script>
			
			function createCookies() {
				document.cookie = 'Ligne1 = ' + contenu[0] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne2 = ' + contenu[1] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne3 = ' + contenu[2] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne4 = ' + contenu[3] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne5 = ' + contenu[4] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne6 = ' + contenu[5] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne7 = ' + contenu[6] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne8 = ' + contenu[7] + ' ; max-age = 3600 ; path=/; samesite=lax' ;
			}

			var initial_array1 = <?php echo '['.implode(', ', $initial_array1). ']'; ?>;
			var initial_array2 = <?php echo '['.implode(', ', $initial_array2). ']'; ?>;
			var initial_array3 = <?php echo '['.implode(', ', $initial_array3). ']'; ?>;
			var initial_array4 = <?php echo '['.implode(', ', $initial_array4). ']'; ?>;
			var initial_array5 = <?php echo '['.implode(', ', $initial_array5). ']'; ?>;
			var initial_array6 = <?php echo '['.implode(', ', $initial_array6). ']'; ?>;
			var initial_array7 = <?php echo '['.implode(', ', $initial_array7). ']'; ?>;
			var initial_array8 = <?php echo '['.implode(', ', $initial_array8). ']'; ?>;
			var initial_array = [initial_array1, initial_array2, initial_array3, initial_array4, initial_array5, initial_array6, initial_array7, initial_array8];
			var contenu = [[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
			
			for (let x = 0; x < 8; x++) {
				for (let y = 0; y < 8; y++){
					if(initial_array[x][y] == 1){
						contenu[x][y] = 1;
					}
					else if(initial_array[x][y] == 2){
						contenu[x][y] = 2;
					}					
				}
			}

			var taille = document.getElementById("variable").value;


			
	
			function afficher(size) {
				for (let x = 1; x <= size; x++) {
					for (let y = 1; y <= size; y++) {
						let n = contenu[x - 1][y - 1];
						contenu[x - 1][y - 1] = n;
						z = x * 10 + y;
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

					createCookies();
				}
			}

			

			function modifValeurs(x, y) {

				let n = contenu[x - 1][y - 1];
				n = (n + 1) % 3;
				if (initial_array[x - 1][y - 1] == 1) {
					n = 1;
				}
				if (initial_array[x - 1][y - 1] == 2) {
					n = 2;
				}
				contenu[x - 1][y - 1] = n;
				z = x * 10 + y;
				if (n == 1) {
					document.getElementById(z).src = "images/img1.png";
				}
				if (n == 2) {
					document.getElementById(z).src = "images/img2.png";
				}
				if (n == 0) {
					document.getElementById(z).src = "images/img0	.png";
				}
				createCookies();
			}

			afficher(<?php echo $taille; ?>);

		</script>
    </div>
	<?PHP
		$_COOKIE["height"];

	?>
<footer id="footer">

</body>
</html>

<?php }?>
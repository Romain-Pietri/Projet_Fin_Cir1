<?php
    session_start();
    require "header.php";
?>
</header>
<body>
	<img id="gadget" src="images/gadget1.gif">

	<div class="score"><button class="trophy"><img id="regles" src="images/rules.png"></button></div>


	<ul id="Menu">
        <div class="score_box">
            <div class="quit_btn"><img id="cross" src="images/cross.png"></i></div>
            <div class="info_title"> Game Rules : </div>
            <div class="score_text">
                <div class="info">The rules are simple. Starship invader is played on a square grid of any size. <br>
				    Initially, some cells contain a rocket or spaceship. All other cells are empty.<br> The goal is to fill each cell so that:<br>
				    <strong>1.</strong> Each row and column contains the same number of rockets and spaceships.<br>
				    <strong>2.</strong> You can have two spaceships or rockets in a row but no more.<br>
				    <strong>3.</strong> Each row and column is unique.<br>
				</div>
               
               </div>
        </div>
    </ul>
     

	  <script>
	  	const score_box = document.querySelector(".score_box");
		const trophee = document.querySelector(".score button.trophy");
		const quit_btn = document.querySelector(".score_box .quit_btn")


		//trophée cliqué
		trophee.onclick = ()=>{
		    score_box.classList.add("appear");
		} 

		//Croix cliquée
		quit_btn.onclick = () =>{
		    score_box.classList.remove("appear");
		}
	 </script> 

<?php
    if(!isset($_SESSION["login"])){
		header("Location:connexion.php");
	}
	
    if(!isset($_SESSION["taille"]) || $_SESSION["taille"] == 0){
        header("Location:taille.php");
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
			$initial_array1 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array2 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array3 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array4 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array5 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array6 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array7 = json_decode($UneLigne["Ligne"]);        
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
			$initial_array8 = json_decode($UneLigne["Ligne"]);        
		}
	}
	$initial_array = [$initial_array1,$initial_array2,$initial_array3,$initial_array4,$initial_array5,$initial_array6,$initial_array7,$initial_array8];

	if(isset($_SESSION["indice"])){
		if($_SESSION["indice"] == "suppo"){
			echo "<p>Vous devez faire des suppositions, il n'y a plus de déductions logiques.</p>";
		}
		else{
			$y = ($_SESSION["indice"])%10;
			$x = ($_SESSION["indice"] - $y)/10;
			echo "<p>Vous pouvez faire une déduction logique sur la ligne $x et la colonne $y</p>";
		}
	}
	if(isset($_SESSION["indice"])){
		unset($_SESSION["indice"]);
    }

	
	
	$array1 = "[0,0,0,0,0,0,0,0]";
	$array2 = "[0,0,0,0,0,0,0,0]";
	$array3 = "[0,0,0,0,0,0,0,0]";
	$array4 = "[0,0,0,0,0,0,0,0]";
	$array5 = "[0,0,0,0,0,0,0,0]";
	$array6 = "[0,0,0,0,0,0,0,0]";
	$array7 = "[0,0,0,0,0,0,0,0]";
	$array8 = "[0,0,0,0,0,0,0,0]";
	require("pulldb.php");
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
				$moula=$indice['Moula'];
				mysqli_close($connexion);
            ?>
            
            <form method="post" action = "cookies.php">
                <input type="submit" id="verif" name="Verify" Value="Verify"/>
                <input type="submit" id="solve" name="Solve" Value="Solve"/>
                <input type="submit" id="restart" name="Restart" Value="Restart"/>
				<input type="submit" id="hint" name="Hint" Value="🔍 <?php echo $hint; ?>"/>
				
            </form>
            <input type = "hidden" id="variable" value = <?php echo $taille ?> />

            <p id="moula"><img id="sous" src="images/sous.png"><?php echo $moula;?></p>


            
 <script>
			
			function createCookies() {
				document.cookie = 'Ligne1 = ' + JSON.stringify(contenu[0]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne2 = ' + JSON.stringify(contenu[1]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne3 = ' + JSON.stringify(contenu[2]) + ' ; max-age = 3600 ; path=/; samesite=lax' ; 
				document.cookie = 'Ligne4 = ' + JSON.stringify(contenu[3]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne5 = ' + JSON.stringify(contenu[4]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne6 = ' + JSON.stringify(contenu[5]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne7 = ' + JSON.stringify(contenu[6]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
				document.cookie = 'Ligne8 = ' + JSON.stringify(contenu[7]) + ' ; max-age = 3600 ; path=/; samesite=lax' ;
			}

			var initial_array1 = <?php echo '['.implode(', ', $initial_array1). ']'; ?>;
			var initial_array2 = <?php echo '['.implode(', ', $initial_array2). ']'; ?>;
			var initial_array3 = <?php echo '['.implode(', ', $initial_array3). ']'; ?>;
			var initial_array4 = <?php echo '['.implode(', ', $initial_array4). ']'; ?>;
			var initial_array5 = <?php echo '['.implode(', ', $initial_array5). ']'; ?>;
			var initial_array6 = <?php echo '['.implode(', ', $initial_array6). ']'; ?>;
			var initial_array7 = <?php echo '['.implode(', ', $initial_array7). ']'; ?>;
			var initial_array8 = <?php echo '['.implode(', ', $initial_array8). ']'; ?>;

			
			var array_en_cours1 = <?php echo '['.implode(', ', $array1). ']'; ?>;
			var array_en_cours2 = <?php echo '['.implode(', ', $array2). ']'; ?>;
			var array_en_cours3 = <?php echo '['.implode(', ', $array3). ']'; ?>;
			var array_en_cours4 = <?php echo '['.implode(', ', $array4). ']'; ?>;
			var array_en_cours5 = <?php echo '['.implode(', ', $array5). ']'; ?>;
			var array_en_cours6 = <?php echo '['.implode(', ', $array6). ']'; ?>;
			var array_en_cours7 = <?php echo '['.implode(', ', $array7). ']'; ?>;
			var array_en_cours8 = <?php echo '['.implode(', ', $array8). ']'; ?>;
			var array_en_cours = [array_en_cours1, array_en_cours2, array_en_cours3, array_en_cours4, array_en_cours5, array_en_cours6, array_en_cours7, array_en_cours8];
			
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

			for (let x = 0; x < 8; x++) {
				for (let y = 0; y < 8; y++){
					if(array_en_cours[x][y] == 1 && initial_array[x][y] == 0){
						contenu[x][y] = 1;
					}
					else if(array_en_cours[x][y] == 2 && initial_array[x][y] == 0){
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
							if (initial_array[x - 1][y - 1] == 1) {
								document.getElementById(z).src = "images/img3.png";
							}
							else{
								document.getElementById(z).src = "images/img1.png";
							}
						}
						if (n == 2) {
							if (initial_array[x - 1][y - 1] == 2) {
								document.getElementById(z).src = "images/img4.png";
							}
							else{
								document.getElementById(z).src = "images/img2.png";
							}
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
					if (initial_array[x - 1][y - 1] == 1) {
						document.getElementById(z).src = "images/img3.png";
					}
					else{
						document.getElementById(z).src = "images/img1.png";
					}
				}
				if (n == 2) {
					if (initial_array[x - 1][y - 1] == 2) {
						document.getElementById(z).src = "images/img4.png";
					}
					else{
						document.getElementById(z).src = "images/img2.png";
					}
				}
				if (n == 0) {
					document.getElementById(z).src = "images/img0.png";
				}
				createCookies();
			}

			afficher(<?php echo $taille; ?>);

		</script>

    </div>
	

</body>
</html>

<?php }?>

<?php
session_start();
require("header.php");

if(!isset($_SESSION["login"])){
	header("Location:connexion.php");
}
	
if(!isset($_SESSION["taille2"]) || $_SESSION["taille2"] == 0){
    header("Location:taillegen.php");
}
else{
	$taille = $_SESSION["taille2"];
    require("connexiondb.php");
?> 

<div id="container">
            
        
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
            
			<form method="post" action = "cookies.php">
                <input type="submit" id="create" name="Create" Value="Create"/>
            </form>
            <input type = "hidden" id="variable" value = <?php echo $taille ?> />

            
         <script>
			var contenu = [[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];

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
				createCookies();
			}

			afficher(<?php echo $taille; ?>);

		</script>
</div>
<?php } ?>
</table></div></body></html>
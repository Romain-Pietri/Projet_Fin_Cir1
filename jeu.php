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
    }


?>

    <div id ="container">
            
        
        <table id="t01">
        
            
            <?php
            $contenu = [];

            for ($j = 1; $j <= $taille; $j++) { 
                echo '<tr>';    
                for ($k = 1; $k <= $taille; $k++) {
                
                echo "<td> ";
                echo "<button class = 'boutonjeu' onclick = 'modifValeurs($j, $k)' type='button'> <img class='img' id= '$j$k' src = 'images/img0.png'> </button>";

                echo " </td> " ; 
                }
                echo "</tr>" ;
                
            }
            ?>
            <input type = "hidden" id="variable" value = <?php echo $taille ?> />

            
         <script> 
            
            var taille = document.getElementById("variable").value;
            var contenu = [[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
            function modifValeurs(x, y) {
                let n = contenu[x-1][y-1];
                n = (n + 1) % 3;
                contenu[x-1][y-1] = n;
                console.log("n = " + n);
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

        </script>
    </div>

</body>
<?php require 'footer.php'; ?>

</html>

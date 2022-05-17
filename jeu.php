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
            padding: 15px;
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
            text-decoration : none;
            color : black;
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
        echo $taille;
    }
?>

    <div id ="container">
            
        
        <table id="t01">
        <script>
            // truc pour récuperer le tableau du générateur
            var contenu = [];
            <?php
            switch ($taille) {
                case 4:
                    echo "var contenu = [[0,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,0]];";
                    break;
                case 6:
                    echo "var contenu = [[0,0,0,0,0,0],[0,0,0,0,0,0],[0,0,0,0,0,0],[0,0,0,0,0,0],[0,0,0,0,0,0],[0,0,0,0,0,0]];";
                    break;
                case 8:
                    echo "var contenu = [[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];";
                    break;
            }
            

            echo "for (var j = 0; j < $taille; j++) {"; 
                echo 'document.write("<tr>");';    
                echo "for (var k = 0; k < $taille; k++) {";
                ?>
                document.write(" <td> <a href=# class='boutonjeu'>" + (contenu[j][k]) + "</a>");
                }
                document.write("</tr>");
            }
           
            
            
            var img1 = document.createElement("img1");
            img1.src = "./Images-jeu/img1.png";

            var img2 = document.createElement("img2");
            img2.src = "./Images-jeu/img2.png";

        </script>
    </div>

</body>
<?php require 'footer.php'; ?>

</html>

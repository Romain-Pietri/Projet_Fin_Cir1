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
        echo $taille;
    }
?>

    <div id ="container">
            
        
        <table id="t01">
        <script>
            // truc pour r�cuperer le tableau du g�n�rateur
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
                document.write(" <td> ");
                document.write(" <button class = 'boutonjeu' onclick='modifValeurs(j,k)' type='button'> <img class = 'img' src = 'images/img1.png'> </button>");

                document.write(" </td> "); 
                }
                document.write("</tr>");
            }


                /*
                var btn = document.createElement("BUTTON");        // Cr�er un �l�ment <button>
                var t = document.createTextNode((contenu[j][k]));       // Cr�er un noeud textuel
                btn.appendChild(t);                                // Ajouter le texte au bouton
                document.body.appendChild(btn);                    // Ajoute la balise <button> � la balise <body>
                */


                /*
                function creationbouton() {
                    var btn =  document.createElement('button'); //cr�er le bouton
                    var input = document.getElementById('newevent');//r�cup�rer l'input
                    btn.setAttribute('name', input .value); //lui donner son nom
                    input.parentNode.insertBefore(btn, input.nextSibling);//l'ins�rer dans le dom o� on veut: ici apr�s l'input 
                    //(ins�rer parmi les fils du parent de l'input, avant le suivant de l'input)
                }
                */
            
            
            var img1 = document.createElement("img1");
            img1.src = "./Images-jeu/img1.png";

            var img2 = document.createElement("img2");
            img2.src = "./Images-jeu/img2.png";

        </script>
    </div>

</body>
<?php require 'footer.php'; ?>

</html>

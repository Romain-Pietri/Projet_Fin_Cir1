<?php
    session_start();

    require "header.php";
    ?>
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


    <script>

    /*var img = document.createElement("img");
    img.src = "./Images-jeu/maison.png";

    var div = document.getElementById("x");
    div.appendChild(img);
    div.setAttribute("style", "text-align:center");*/

    </script>

</body>
<?php require 'footer.php'; ?>

</html>

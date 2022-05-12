<!DOCTYPE html>
<html lang="en">
<head>

    <title>ATESPUTAINDELOUPE</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>
<?php
    session_start();

    require "header.php";
    ?>
<body>

    <div id="x"></div>

    <script>

    var img = document.createElement("img");
    img.src = "./Images-jeu/maison.png";

    var div = document.getElementById("x");
    div.appendChild(img);
    div.setAttribute("style", "text-align:center");

    </script>

</body>
<?php require 'footer.php'; ?>

</html>
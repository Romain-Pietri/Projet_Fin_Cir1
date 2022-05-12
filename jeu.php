<?php
    session_start();

    require "header.php";
    ?>
</header>
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
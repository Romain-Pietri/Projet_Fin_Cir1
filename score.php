<?php
    session_start();

    require "header.php";
    ?>

    <header>

        <button> <a href="score.php"> Scores </a> </button>

        <button> <a href="connexion.php"> Connect </a> </button>

        <button> <a href="reglesjeu.php"> Rules </a> </button>

    </header>

<main>
    <?php
    require(connexiondb.php);
    $request="SELECT * FROM utilisateurs ORDER BY Score DESC"
    $result=mysqli_query($connexion,$request);
    if ( $result == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $count=0;
    while($ligne=mysqli_fetch_assoc($result)){
        $count=$count+1;
    }
    if($count<10){
        $i=0;
        echo'
        <table>
            <th>
            <td>Pseudo </td>
            <td>Score </td>
            </th>
            ';
        while($ligne=mysqli_fetch_assoc($result) && $i<$count){
            echo"
            <tr>
            <td> $ligne[login]</td>
            <td> $ligne[Score]</td>
            </tr>
            ";
            $i=$i+1;
        }
        while($ligne=mysqli_fetch_assoc($result) && $i<10){
            echo"
            <tr>
            <td> ----------</td>
            <td> 0 </td>
            </tr>
            ";
        }
        echo"</table>";
    }
    if($count>=10){
        $j=0;
        echo'
        <table>
            <th>
            <td>Pseudo </td>
            <td>Score </td>
            </th>
            ';
        while($ligne=mysqli_fetch_assoc($result)&& $j<10){
            echo"
            <tr>
            <td>$ligne[login]</td>
            <td>$ligne[Score]</td>
            </tr>
            ";
        }
        echo"</table>";
    }
    ?>

</main>

<footer>

        <?php require 'footer.php'; ?>



    </footer>

</body>
</html>
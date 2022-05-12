<?php
    session_start();

    require "header.php";
?>

<h1> Scoreboard :</h1>
<br>

    <nav>
        <ul>
            <li><a href="jeu.php"> Game </a></li>
            <li><a href="reglesjeu.php"> Rules </a></li>
        </ul>
    </nav>
<br>


<main>
    <?php
    require("connexiondb.php");
    $request="SELECT login,Score FROM utilisateurs ORDER BY Score DESC";

    $result = $connexion->query($request);
    if ( $result == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    else {

        $count=mysqli_num_rows($result);
        echo"<table class='table'>
            <tr>
            <th>Pseudo </th>
            <th>Score </th>
            </tr>";
        if($count<10){
            $i=0;
            while($ligne = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach ($ligne as $UneLigne) {
                    echo"
                    <td> $UneLigne </td>";
                    $i=$i+1;
                }   
                echo "</tr>";
            }

            

            while($i<12){
                echo"<tr>";
                echo"
                <td> ---------- </td>
                <td> 0 </td>";
                echo "</tr>";
                $i=$i+1;
            }

            echo"</table>";
        }
    }

    if($count>=10){
        $j=0;
        echo"<table class='table'>
            <tr>
            <th>Pseudo </th>
            <th>Score </th>
            </tr>";
        while($ligne=mysqli_fetch_assoc($result)&& $j<10){
            echo "<tr>";
            foreach ($ligne as $UneLigne) {
                echo"
                <td> $UneLigne </td>";
                $i=$i+1;
            }
            echo "</tr>";
        }
        echo"</table>";
    }
    ?>
    <br><br>

</main>

<footer>

<?php require 'footer.php'; ?>
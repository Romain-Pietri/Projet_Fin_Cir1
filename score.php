<?php
    session_start();

    require "header.php";
?>

<h1> Scoreboard :</h1>
<br>

<br>
</header>

<main>
    <div class="tableauscore">
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
        echo"<table class='score'>
            <tr>
            <th class='ligne'>Nickname </th>
            <th class='ligne'>Score </th>
            </tr>";
        if($count<10){
            $i=1;
            while($ligne = mysqli_fetch_assoc($result)){
                echo "<tr>"
                ;
                if($i==1){$first=$ligne['login'];}
                if($i==2){$sec=$ligne['login'];}
                if($i==3){$third=$ligne['login'];}

                foreach ($ligne as $UneLigne) {
                    echo"<td class='ligne'> $UneLigne </td>";
                }
                $i=$i+1;
                echo "</tr>";
            }

            

            while($count!=10){
                echo"<tr>";
                echo"
                <td class='ligne'> ---------- </td>
                <td class='ligne'> 0 </td>";
                echo "</tr>";
                $count=$count+1;
            }

            echo"</table>";

        }
    

    else{
        $j=0;
        while($ligne=mysqli_fetch_assoc($result)&& $j<10){
            echo "<tr>";
            if($j==1){$first=$ligne['login'];}
            if($j==2){$sec=$ligne['login'];}
            if($j==3){$third=$ligne['login'];}
                
            foreach ($ligne as $UneLigne) {
                echo"<td class='ligne'> $UneLigne </td>";
                $j=$j+1;
            }
            echo "</tr>";
        }
        echo"</table>";
    }
    }
    ?>
    </div>
    
    <br><br>

    <p id="first"><strong><?php echo $first; ?></strong></p>
    <p id="sec"><strong><?php echo $sec; ?></strong></p>
    <p id="third"><strong><?php echo $third; ?></strong></p>

    <img id="podium" src="images/podium.png">
    <br><br>

</main>

<footer>
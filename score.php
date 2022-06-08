<?php
    session_start();

    require "header.php";
    require("connexiondb.php");
    $login=$_SESSION['login'];
    $request1="SELECT ID FROM utilisateurs WHERE login='$login'";
    $result=mysqli_query($connexion,$request1);
    if ( $result == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $ligne=mysqli_fetch_assoc($result);
    $id=$ligne["ID"];
?>

    <a href="badge.php"><img id="regles" class="trophy" src="images/badge.png"></a>

<br><br>
    <img id="title" src="images/scoreboard.gif">
</header>

<main>
    
    <img id="gadget" src="images/gadget1.gif">
    <img id="title" src="images/victory.gif">
    
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
        $request1="UPDATE badge SET Badge8=Badge8+1 WHERE ID='$id'";
        $request2="UPDATE badge SET Badge9=Badge9+1 WHERE ID='$id'";
        $request3="UPDATE badge SET Badge10=Badge10+1 WHERE ID='$id'";
        if($login=$first){
            $exe=mysqli_query($connexion,$request1);
            if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
            $exe2=mysqli_query($connexion,$request2);
            if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
            $exe3=mysqli_query($connexion,$request3);
            if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
        }
        if($login=$sec){
            $exe=mysqli_query($connexion,$request1);
            if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
            $exe2=mysqli_query($connexion,$request2);
            if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
        }
        if($login=$third){
            $exe=mysqli_query($connexion,$request1);
            if ( $exe == FALSE ){
                echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                die();
            }
        }
        
        echo"</table>";
    }
    }
    ?>
    </div>
    
    

    <div id="conteneur">
    <span class="ville"><p id="sec"><strong><?php echo $sec; ?></strong></p></span>
    <span class="ville"><p id="first"><strong><?php echo $first; ?></strong></p></span>
    <span class="ville"><p id="third"><strong><?php echo $third; ?></strong></p></span>
    <div>

    <br><br>

</main>

</div>
</div>
</main>
</body>
</htlm>
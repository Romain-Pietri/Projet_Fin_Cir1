<?php
    session_start();
    require "header.php";
?>

<form class="formLetter" action="calculscore.php" method="post">
        <fieldset>
            <legend>test</legend>
            <label>test :</label>
            <input type="text" name="login" placeholder="test" required>
            <br>
            <input type="submit" name="valider" value="valider"/>
            <br>
        </fieldset>
     </form>





<?php 

$_SESSION['taille'] = 8;
$_SESSION['indice'] = 0;

require 'footer.php';

?>
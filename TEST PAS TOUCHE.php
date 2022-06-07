<?php  
    session_start();
    require "header.php";
?>

<form method="post" action="cookies.php">
<div class="checkboxes-and-radios">
  <h1>Choose your grid size :</h1>
  <input type="radio" name="radio-cats" id="radio-1" value="4" checked>
  <label for="4x4" class="input">4x4</label>
  <input type="radio" name="radio-cats" id="radio-2" value="6">
  <label for="6x6" class="input">6x6</label>
  <input type="radio" name="radio-cats" id="radio-3" value="8" checked>
  <label for="8x8" class="input">8x8</label>
  <input type="submit" name="Generate" Value="Generate"/>
</div>
</form>
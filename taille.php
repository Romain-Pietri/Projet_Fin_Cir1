<?php  
    session_start();
    require "header.php";

    if(!isset($_SESSION["taille"]) || $_SESSION["taille"] == 0){

        echo '
        <br><br>
<main class="taille">
<form method="post" action="cookies.php">
<div class="containerOuter">
  <legend class="size">Choose your grid size : </legend>
  <div class="container">
    <input type="radio" class="hidden" id="input1" name="taille" value="4">
    <label class="entry" for="input1"><div class="circle"></div><div class="entry-label">4x4</div></label>
    <input type="radio" class="hidden" id="input2" name="taille" value="6">
    <label class="entry" for="input2"><div class="circle"></div><div class="entry-label">6x6</div></label>
    <input type="radio" class="hidden" id="input3" name="taille" value="8">
    <label class="entry" for="input3"><div class="circle"></div><div class="entry-label">8x8</div></label>
    <div class="highlight"></div>
    <div class="overlay"></div>
  </div>
  <input type="submit" name="Generate" Value="Generate"/>
  <br><br>
</div>
<svg width="0" height="0" viewBox="0 0 40 140">
  <defs>
    <mask id="holes">
      <rect x="0" y="0" width="100" height="140" fill="white" />
      <circle r="12" cx="20" cy="20" fill="black"/>
      <circle r="12" cx="20" cy="70" fill="black"/>
      <circle r="12" cx="20" cy="120" fill="black"/>
    </mask>
  </defs>
</svg>

</form>
</main>';
        
    }
    else{
        header("Location: jeu.php");
    }
?>

<div href="taillegen.php" class="wrapper">
  <button class="but">
    Create your own grid !
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </button>
</div>
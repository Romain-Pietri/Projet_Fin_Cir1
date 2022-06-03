<!DOCTYPE html> 
<html lang="fr">
<head> 
	<meta charset="UTF-8">
	<title> Starship invader ! </title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
	<link rel="icon" href="images/log.png">
</head>

<body>
		<header>

<a><img id="logo" src="images/log.png"></a>
<img id="gadget" src="images/gadget1.gif">

<div id="container" class="cont_ainer">
	<nav>
	<div id="circlemain" class="circle_main" >
		<div class="arc1 line1">
           <div class="arc1 line2">
            <div class="arc1 line3">

            </div>
          </div>
	</div>
	<div class="reactor">
	<div class="navcontainer" onclick="navTog(this); barWidth();">
<div class="hamContainer" onclick="hamFunction(this)">
  <div class="hbar1"></div>
  <div class="hbar2"></div>
  <div class="hbar3"></div>
  <div class="hbar4"></div>
  <div class="hbar5"></div>
</div>
 <span class="reacttext">MENU</span>
 	</div>	
	</div>
	<span  id="barleft" class="bar_left ">
		<ul class="nav_top" id="navtop">
		<li><a href="jeu.php">Game</a></li>
		<li><a href="score.php">Score</a></li>
		<li><a href="shop.php">Shop</a></li>
		</ul>	
	</span>
	<audio id="myAudio" src="images/music1.mp3" preload="auto">
	</audio>
	
	<span id="barright" class="bar_right">	
	<ul class="nav_bottom" id="navbottom">
	<li><a href="deco.php"><img id="parametres" src="images/logout.png"></a></li>
	<li><a href="parametres.php"><img id="parametres" src="images/para.png"></a></li>
	<li><a onClick="togglePlay()"><img id="parametres" src="images/pp.png"></a></li>
	</ul>
	</span>
</div>
</nav>
</div>

<script>
	function barWidth(){
		var d =document.getElementsByClassName("cont_ainer");
		d[0].classList.toggle("change");	
			}	
				
	function navTog(x) {
	    x.classList.toggle("change");
	}		

	var myAudio = document.getElementById("myAudio");
	var isPlaying = false;

	function togglePlay() {
		isPlaying ? myAudio.pause() : myAudio.play();
	};

	myAudio.onplaying = function() {
		isPlaying = true;
	};
	myAudio.onpause = function() {
		isPlaying = false;
	};
</script>

	<?php		
		if (isset($_COOKIE['theme'])){ 
			$style=$_COOKIE['theme'];	
		}
		else {
			$style="space1";
		}
		?>
		<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>
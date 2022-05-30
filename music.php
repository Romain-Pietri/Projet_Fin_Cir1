<?php
if(isset($_POST['Play'])){
		$music=1;
		if (isset($_COOKIE['music'])){ 
			$_COOKIE['music']=$music;
		}
		else{
			setcookie("music" , $music , time()+(365*24*3600));
		}
	}
	header("location: parametres.php")
?>
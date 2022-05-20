<?php
function verificationPassword($string) {
        	$chiffre = preg_match('/[0-9]/', $string);
        	$maj = preg_match('/[A-Z]/', $string);
        	$min = preg_match('/[a-z]/', $string);

    		if (strlen($string) >= 8 && $chiffre && $maj && $min){
    			return TRUE;
    		}
    		else{
    			return FALSE;
    		}
		}

?>
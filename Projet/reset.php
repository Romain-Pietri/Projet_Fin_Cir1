<?php
session_start();
unset($_SESSION["taille"]);
unset($_SESSION["taille2"]);
$_COOKIE["Ligne1"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne2"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne3"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne4"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne5"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne6"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne7"] = "[0,0,0,0,0,0,0,0]";
$_COOKIE["Ligne8"] = "[0,0,0,0,0,0,0,0]";
require("save.php");

header("Location:taille.php");

?>
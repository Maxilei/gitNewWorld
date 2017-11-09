<?php 

session_start();

if (!($cnx = mysqli_connect("localhost","maxime","passf203","dbmiNewWorld"))) {
	echo ("Connexion impossible".$cnx->connect_error());
		return false;	
}

$cnx->query("set names utf8_bin");

$url_home = "Index_connexion.php";


 ?>
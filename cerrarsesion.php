<?php
session_start();	
if($_SESSION != null){
	$_SESSION['usuario'];
	session_destroy();
}
header("Location:index.php");
?>
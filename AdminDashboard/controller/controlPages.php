<?php 
if(isset($_GET["a"])){
	require_once("admin/".$_GET["a"].".php");
}else if(isset($_GET["o"])){
	require_once("operator/".$_GET["o"].".php");
}else{
	require_once("operator/home.php");
}
?>
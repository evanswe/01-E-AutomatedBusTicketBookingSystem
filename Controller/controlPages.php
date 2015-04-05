<?php 
if(isset($_GET['p'])){
	include_once("view/".$_GET['p'].".php");
}
else if(isset($_GET['u'])){
	include_once("user/".$_GET['u'].".php");
}else{
	include_once("view/home" .".php" );
}
?>
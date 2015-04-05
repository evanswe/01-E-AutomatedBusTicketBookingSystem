<?php
$departure = new DepartureConfig();
$departure->Id = $_GET['id'];

	
	if($departure->Delete()){
		
		Redirect("?a=departureconfigAdd&ms=Deleted Successfully");
	}else{
		Redirect("?a=departureconfigAdd&ms={$departure->err}");
	}




?>
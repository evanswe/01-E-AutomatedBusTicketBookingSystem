<?php 
	function MS($data) {
		return mysql_real_escape_string(strip_tags($data));	
	}
	
	function Redirect($data) {
		echo "<script>";
		echo "self.location = '{$data}';";
		echo "</script>";	
	}
	
	function mer($data){
		echo "<p style='color:red'>".$data."</p>";
	}

	function msc($data){
		echo "<p style='color:green'>".$data."</p>";
	}


	function Table($data, $url){
		if($data != ""){
			for($i=0; $i<count($data); $i++){
				echo "<tr>";
				for($j=1; $j<count($data[$i]); $j++){
					echo "<td>";
					if(substr($data[$i][$j], -4) == ".txt"){
						FileRead("files/" . $data[$i][$j]);
					}else if((substr($data[$i][$j], -4) == "jpeg") ||
							(substr($data[$i][$j], -4) == ".jpg") ||
							(substr($data[$i][$j], -4) == ".png") ||
							(substr($data[$i][$j], -4) == ".gif")){
							echo '<img src="images/'.$data[$i][$j].'" width="100" height="60"/>';
					}else{
						echo $data[$i][$j];
					}
					echo "</td>";
				}
				if($url != ""){
					echo "<td><a href='?o={$url}edit&id={$data[$i][0]}'>Edit</a></td>";
					echo "<td><a href='?o={$url}del&id={$data[$i][0]}'>Delete</a></td>";
				}
				echo "</tr>";
			}
		}
	}
	
	function Option($data){
		for($i=0; $i<count($data); $i++){
			echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";
		}
	}
	
	function Selected($data, $id){
		for($i=0; $i<count($data); $i++){
			if($data[$i][0] == $id){
				echo "<option value='{$data[$i][0]}' selected='selected'>{$data[$i][1]}</option>";
			}else{
				echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";
			}
		}
	}
	
	
	
	
	function UploadImage($data){
	if(($data['type'] == "image/jpeg") ||
		($data['type'] == "image/jpg") ||
		($data['type'] == "image/png") ||
		($data['type'] == "image/gif")){
			
			$img = $data['name'];
			$img = stripslashes($img);
			$img = strtolower($img);
			if(strlen($img) > 10){
			$img = substr($img, -10);
			}
			//Generate an unique random name.
			$img = rand(1,9999) . time() . $img;//Finally generated an unique name.
			$new_name = "images/" . $img;
			copy($data['tmp_name'], $new_name);
		}else{
			$img = "";
		}
		return $img;
	}
	
	
	function CreateFile($data){
		$fn = time() . rand(1, 999999) . ".txt";
		$fnn = "files/" . $fn;
		$fh = fopen($fnn, 'w');
		$fhh = fwrite($fh, $data);
		fclose($fh);
		return $fn;
	}


	function FileRead($data) {
		$fn = fopen($data, 'r');
		$dt = fread($fn, filesize($data));
		fclose($fn);
		echo $dt;
	}
	
	
	function read_files($file_name, $ln)	{
		$nm = "AdminDashboard/files/" . $file_name;
		$fh = fopen($nm, "r");
		$dataa = fread($fh, filesize($nm));
		fclose($fh);
		if($ln == "All") {
			echo $dataa;
		}
		else {
			echo substr($dataa, 0, $ln);
		}	
	}
	


?>
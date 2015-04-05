	<?php
	class BusSeats extends DB{
		   
		   public $Id;
		   public $SeatName;
		   
		   
		   public function Insert() {
			$this->Connect();
			$sql = "insert into busseats(name)
								values('".MS($this->SeatName)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			echo $sql;
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update busseats
						set
							name = '".MS($this->SeatName)."'
						where
							id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete(){
			$this->Connect();
			$sql = "delete from busseats 
						where
							id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}	
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from busseats where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->SeatName = $d[1];	
			}
			
		}
		
		public function Select($total_number_row = NULL)
		{
			$this->Connect();
			$a = "";
			$sql = "select * from busseats";
			$sql .= " ORDER BY name ASC";
			if($total_number_row != NULL){
				$sql .= " LIMIT ".$total_number_row;
			}
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
			
}//end of main brace
	
	
	
?>
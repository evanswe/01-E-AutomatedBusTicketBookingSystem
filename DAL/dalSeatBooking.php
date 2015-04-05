	<?php
	class SeatBooking extends DB{
		   public $Id;		   
		   public $DepartureConfigId;
		   public $SeatsArray;
		   public $PassengerId;
		   public $ConfirmedBy;
		   public $ConfrimationStatus;
		   
		public function Insert(){
		        $this->Connect();
				$sql = "insert into  seatbooking(departure_config_id, seats_array, passenger_id, confirmed_by, confirmation_status)
				           values('".MS($this->DepartureConfigId)."',
						          '".MS($this->SeatsArray)."',
								  '".MS($this->PassengerId)."',
								  '".MS($this->ConfirmedBy)."',
								  '".MS($this->ConfrimationStatus)."')";
	//echo $sql;
								 if(mysql_query($sql)){
									 return true;
									 } 
								$this->err = mysql_error();
								return false;	 
			
			}//end of insert brace      
			
			
			
		public function Update($DepartureConfigId, $SeatId, $PassengerId){
			$this->Connect();
			$sql ="update 
			                  set
							  departure_configid ='".MS($this->DepartureConfigId)."',
							  seatid = '".MS($this->SeatId)."',
							  passengerid = '".MS($this->PassengerId)."',
							  confirmedstatus = '".MS($this->ConfrimedStatus)."'
							  where
							  departure_configid = '".MS($this->DepartureConfigId)."' 
							   
							  AND
							  seatid = '".MS($this->SeatId)."'
							  AND
							  passengerid  ='".MS($this->PassengerId)."'";
							  
							  if(mysql_query($sql)){
								  return true;
								  }
								$this->err = mysql_error();
								return false;
				
			           }//end of main brace of update
				
			
		public function Delete(){
			  $this->Connect();
			  $sql =" delete from assignseats 
			  where id = '".MS($this->Id)."'";
                
				 if(mysql_query($sql)){
					 return true;
				 }
					$this->err = mysql_error();
					return false;     			
			}//end of main brace of delete	
		
	    public function SelectById(){
			$this->Connect();
			$sql = "select * from assignseats 
			  where counterid ='".$this->CounterId."'
			  AND  
			  departure_configid = '".MS($this->Departure_ConfigId)."'
			  AND
			  seatid = '".MS($this->SeatId)."'";
			  
			$sql = mysql_query($sql);
			while($r = mysql_fetch_row($sql)){
				  $this->CounterId = $r[1];
				  $this->Departure_ConfigId = $r[2];
				  $this->SeatId = $r[3];
				
				
				}
		  
		  
		  }//end of main brace selectbyid

		  public function CheckExist(){
		  	$this->Connect();
			$a = "";
			$sql ="select id from seatbooking Where id = id"; 

			if($this->DepartureConfigId != ""){
				$sql .= " AND departure_config_id = '".MS($this->DepartureConfigId)."'";
			}

			if($this->SeatsArray != ""){
				$sql .= " AND seats_array LIKE '%".MS($this->SeatsArray)."%'";		
			}
			$sql = mysql_query($sql);
			return mysql_num_rows($sql);
		  }				   	
		
	public function Select($seats_array = ""){
			$this->Connect();
			$a = "";
			$sql ="select * from seatbooking Where id = id"; 

			if($this->DepartureConfigId != ""){
				$sql .= " AND departure_config_id = '".MS($this->DepartureConfigId)."'";
			}

			if($this->SeatsArray != ""){
				$sql .= " AND seats_array LIKE '%".MS($this->SeatsArray)."%'";		
			}

			echo $sql;
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;	
			}
			return $a;
		}
		
}
		
?>
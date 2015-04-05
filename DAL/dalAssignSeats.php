	<?php
	class AssignSeats extends DB{
		   
		   public $CounterId;
		   public $Departure_ConfigId;
		   public $SeatId;
		   
		public function Insert(){
		        $this->Connect();
				$sql = "insert into assignseats(counterid, departure_configid, seatid)
				           values('".MS($this->CounterId)."',
						          '".MS($this->Departure_ConfigId)."',
								  '".MS($this->SeatId)."')";
								 if(mysql_query($sql)){
									 return true;
									 } 
								$this->err = mysql_error();
								return false;	 
			
			}//end of insert brace      
			
			
			
		public function Update($CounterId, $Departure_ConfigId, $SeatId){
			$this->Connect();
			$sql ="update assignseats
			                  set
							  counterid ='".MS($this->CounterId)."',
							  departure_configid = '".MS($this->Departure_ConfigId)."'
							  seatid = '".MS($this->SeatId)."'
							  where 
							  counterid = '".MS($CounterId)."' 
							  AND
							  departure_configid = '".MS($Departure_ConfigId)."'
							  AND
							  seatid = '".MS($this->SeatId)."'";
							  
							  if(mysql_query($sql)){
								  return true;
								  }
								$this->err = mysql_error();
								return false;
				
			           }//end of main brace of update
				
			
		public function Delete(){
			  $this->Connect();
			  $sql =" delete from assignseats 
			  where counterid ='".$this->CounterId."'
			  AND  
			  departure_configid = '".MS($this->Departure_ConfigId)."'
			  AND
			  seatid = '".MS($this->SeatId)."'";
                
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
		
	public function Select(){
			$this->Connect();
			$a = "";
			$sql ="select assignseats.counterid, counter.name, assignseats.departure_configid,  departure_config.id, departure_config.coachno, assignseats.seatid,  busseats.name from 
			 counter,departure_config, busseats, assignseats
			      where assignseats.counterid = counter.id
				        AND
						assignseats.departure_configid = departure_config.id
						AND
						assignseats.seatid = busseats.id"; 
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;	
			}
			return $a;
		}
		
}
		
?>
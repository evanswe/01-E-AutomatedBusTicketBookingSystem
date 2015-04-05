	<?php
	class DepartureConfig extends DB{
		   
		   public $Id;
		   public $BusId;
		   public $CoachNumber;
		   public $StationFrom;
		   public $StationTo;
		   public $BusFare;
		   public $ViaCountersArray;
		   public $ViaLocation;
		   public $JourneyType;
		   public $StartTime;
		   public $EndTime;
		   public $Date;
		   
		 
		public function Insert(){
			   $this->Connect();
			   $sql = "insert into departure_config(busid, coachno, station_from, station_to, bus_fare, via_counters_array,  vialocation, journey_type, start_time, end_time, startdate)
			                                   values('".MS($this->BusId)."',
											          '".MS($this->CoachNumber)."',
													  '".MS($this->StationFrom)."',
													  '".MS($this->StationTo)."',
													  '".MS($this->BusFare)."',
                                                      '".MS($this->ViaCountersArray)."',
													  '".MS($this->ViaLocation)."',
													  '".MS($this->JourneyType)."',
													  '".MS($this->StartTime)."',
													  '".MS($this->EndTime)."',
													  '".MS($this->Date)."')";
			   
			echo $sql;                                                 
													  if(mysql_query($sql)){
														  return true;
													  }
														$this->err = mysql_error();
														return false;
							
		   }//end of insert brace   
		   
		   public function Update(){
			      $this->Connect();
				  $sql = "update departure_config
				                              set 
											  busid = '".MS($this->BusId)."',       
											  coachno = '".MS($this->CoachNumber)."',
											  station_from = '".MS($this->StationFrom)."',
											  station_to = '".MS($this->StationTo)."',
											  bus_fare = '".MS($this->BusFare)."',
											  via_counters_array = '".MS($this->ViaCountersArray)."',
											  vialocation = '".MS($this->ViaLocation)."',
											  journey_type = '".MS($this->JourneyType)."',
											  startdate = '".MS($this->Date)."',
											  start_time = '".MS($this->StartTime)."',
											  end_time = '".MS($this->EndTime)."'
											  
											  
											  where id = '".MS($this->Id)."'";
											 
											 if(mysql_query($sql)){
												 return true;
												 } 		                           
											$this->err = mysql_error();
											  return false;
																			   
			   }//end of update brace
			   
			   
		public function Delete(){
			    $this->Connect();
				$sql = "delete from departure_config  where id = '".MS($this->Id)."'";
				if(mysql_query($sql)){
					return true;
					}
				$this->err = mysql_error();
				   return  false;	
		
			
			}//end of delete brace
			
		public function SelectById(){
			    $this->Connect();
				$sql = "select * from departure_config  where id = '".MS($this->Id)."'";
				$sql = mysql_query($sql);
				while($r = mysql_fetch_row($sql)){
					 $this->BusId = $r[1];
					 $this->CoachNumber = $r[2];
					 $this->StationFrom = $r[3];
					 $this->StationTo = $r[4];
					 $this->BusFare = $r[5];
					 $this->ViaCountersArray =$r[6];
					 $this->ViaLocation = $r[7];
					 $this->JourneyType = $r[8];
					 $this->Date = $r[9];
					 $this->StartTime = $r[10];
					 $this->EndTime = $r[11];
					 
				}		
			
	 	}//end of selectbyid brace 
	 
	 	public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "SELECT dc.id, bus.name AS BusName, dc.coachno AS CoachNo, (select name from station where id = station_from) AS StationFrom,  
			(select name from station where id = station_to) AS StationTo, dc.bus_fare AS BusFare,  dc.via_counters_array, dc.vialocation AS Location, dc.journey_type AS JourneyType, 
			dc.start_time AS TimeStart, dc.end_time AS EndTime, dc.startdate AS Date, bus.seat  FROM departure_config AS dc, station AS st, bus
			WHERE dc.busid = bus.id 
AND dc.station_from = st.id";
													
													//echo $sql;
			
			if($this->StationFrom != ""){
				$sql .= " AND dc.station_from = '".$this->StationFrom."'";
			}
			
			if($this->StationTo != ""){
				$sql .= " AND dc.station_to = '".$this->StationTo."'";
			}
			
			if($this->Date != ""){
				$sql .= " AND dc.startdate = '".$this->Date."'";
			}


			if($this->Id != ""){
				$sql .= " AND dc.id = '".$this->Id."'";
			}
				//echo $sql;


			$sql = mysql_query($sql);
			while($d = mysql_fetch_array($sql)) {
				$a[] = $d;	
			}

			return $a;
		}	
			
		
	}//end of main brace 
	
	
	
	?>
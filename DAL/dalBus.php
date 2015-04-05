  <?php
  class Bus extends DB{
	  
	  public $Id;
	  public $Name;
	  public $Bus_No;
	  public $Bus_Type;
	  public $Brand;
	  public $Other_Info;
	  public $Seat;
	  
	  
	  public function Insert(){
		  $this->Connect();
		  $sql = "insert into bus(name, bus_no, bus_type, brand, other_info, seat)
		                values('".MS($this->Name)."',
						        '".MS($this->Bus_No)."',
								'".MS($this->Bus_Type)."',
								'".MS($this->Brand)."',
								'".MS($this->Other_Info)."',
								'".MS($this->Seat)."')";
								
							if(mysql_query($sql)){
									return true;
							}
		  
                            $this->err = mysql_error();
							return false;		  
		  
		  }//main brace of insert
		  
		  
     public function Update(){
		 $this->Connect();
		 $sql = "update bus
		                 set
						  name = '".MS($this->Name)."',
						  bus_no = '".MS($this->Bus_No)."',
						  bus_type = '".MS($this->Bus_Type)."',
						  brand = '".MS($this->Brand)."',
						  other_info = '".MS($this->Other_Info)."',
						  seat = '".MS($this->Seat)."'
						  
						  where id = '".MS($this->Id)."'"; echo $sql; 
						  
						if(mysql_query($sql)){
						  return true; 
						}
						$this->err = mysql_error();
						return false;	  
		 }//end of update brace
	  
	  public function Delete(){
		  $this->Connect();
		  $sql = "delete from bus where id ='".MS($this->Id)."'";
		  echo $sql;
          if(mysql_query($sql)){
			  return true;
			  }	
			$this->err = mysql_error();
			return false;  	  
		  }//end of main brace delete 
		  
		  
		  public function Select(){
			$this->Connect();
			$a = "";
			$sql ="select * from bus";
			$sql = mysql_query($sql);
			while($r = mysql_fetch_row($sql)) {
				$a[] = $r;	
			}
			return $a;
		}
		  
		  
		  
		  
		  
		  
		  
		  
	  
	  public function SelectById(){
		  $this->Connect();
		  $sql = "select * from bus where id ='".MS($this->Id)."'";
		  $sql = mysql_query($sql);
		  while($r = mysql_fetch_row($sql)){
			  $this->Name = $r[1];
			  $this->Bus_No = $r[2];
			  $this->Bus_Type = $r[3];
			  $this->Brand = $r[4];
			  $this->Other_Info = $r[5];
			  $this->Seat = $r[6];
			  }
		  
 }//end of selectbyid
	  
	  
	  
	  	
			
  }//main brace
  ?>
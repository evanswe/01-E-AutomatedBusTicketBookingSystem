	<?php
	class Station extends DB{
		
		public $Id;
		public $Name;
		public $Description;
		
		public function Insert(){
			  $this->Connect();
			  $sql = "insert into station(name, description)
			                     values('".MS($this->Name)."',
								         '".MS($this->Description)."')";
										
									if(mysql_query($sql)){
										
										return true;
										}	
								 $this->err = mysql_error();
								   return false;
								 
								  
			}//end of insert brace 
		
		public function Update(){
			   $this->Connect();
			   $sql ="update station
			                   set
							      name = '".MS($this->Name)."',
								  description = '".MS($this->Description)."'
								  where 
								  id = '".MS($this->Id)."'";
								 
							
							if(mysql_query($sql)){
								return true;
								}	  
			               $this->err = mysql_error();
						      return false;
			   
			}//end of main update brace 
			
		
		public function Delete(){
			   $this->Connect();
			   $sql = "delete from station where id = '".MS($this->Id)."'";
			      
				  if(mysql_query($sql)){
					  return true;
					  
					  } 
			      $this->err = mysql_error();
				     return false;
			
			}//end of delete brace 
		
		
	 public function SelectById(){
		    $this->Connect();
			$sql ="select * from station where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($r = mysql_fetch_row($sql)){
				
				$this->Name = $r[1];
				$this->Description = $r[2];
			}
		 
      }//end of selectbyid brace	


         public function Select()
				{
					$this->Connect();
					$a = "";
					$sql = "select * from station";
					
					$sql = mysql_query($sql);
					while($d = mysql_fetch_row($sql)) {
						$a[] = $d;	
					}
					return $a;
		      }
		
      }//end of  main barce 
	
	
	
	?>
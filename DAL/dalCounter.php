	<?php
	class Counter extends DB{
		
		public $Id;
		public $Name;
		public $Address;
		public $Telephone_Contact;
		public $Status;
		
		
		
		public function Insert(){
			$this->Connect();
			$sql = "insert into counter(name, address, telephone_contact, status)
			         values('".MS($this->Name)."',
					         '".MS($this->Address)."',
							 '".MS($this->Telephone_Contact)."',
							 '".MS($this->Status)."'
					                  )";
		                         
								 if(mysql_query($sql)){
									 return true;
									 
									 }
							$this->err = mysql_error();
							    return false;
								
							
					}//end of main brace of insert
			
		public function Update(){
			        $this->Connect();
					$sql = "update counter
					                   set
									     name = '".MS($this->Name)."',
										 address = '".MS($this->Address)."',
										 telephone_contact = '".MS($this->Telephone_Contact)."',
										 status = '".MS($this->Status)."'
										    
										   where id = '".MS($this->Id)."'"; echo $sql;
										    
									if(mysql_query($sql)){
										return true;
										}		
								   $this->err = mysql_error();
								
			}//end of main brace update			
									 	
			
			             
			public function Delete(){
				  $this->Connect();
				  $sql ="delete from counter where id ='".MS($this->Id)."'";
				  if(mysql_query($sql)){
					  return true;
					  }
					$this->err = mysql_error();
                    return false;				
				} //end of main brace delete	
				
				
			public function SelectById(){
				   $this->Connect();
				   $sql ="select * from counter where id = '".MS($this->Id)."'";
				   $sql = mysql_query($sql);
				   while($r = mysql_fetch_row($sql)){
					   $this->Name = $r[1];
					   $this->Address = $r[2];
					   $this->Telephone_Contact = $r[3];
					   $this->Status = $r[4];
					   
					   }
				
				
				}	//end of selectbyid
				
				
				
				
				
				
				
				
					            
			
			
        public function Select(){
			$a = "";
			$this->Connect();
			$sql = "select * from counter";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		
		}
		
		
}//end of main brace 
	
	
	?>
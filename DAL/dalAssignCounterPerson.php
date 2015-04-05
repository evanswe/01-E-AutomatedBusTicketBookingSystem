	<?php
	class AssignCounterPerson extends DB{
		public $UserId;
		public $CounterId;
		public $Contact_info;
		   
		   
		public function Insert(){
		        $this->Connect();
				$sql = "insert into assigncounter(userid, counterid, contact_info)
				           values('".MS($this->UserId)."',
						          '".MS($this->CounterId)."',
								  '".MS($this->Contact_info)."')"; echo $sql;
								  
				if(mysql_query($sql)){
					return true;
				} 
				$this->err = mysql_error();
				return false;	 
		}//end of insert brace      
		
		
		public function Update(){
			$this->Connect();
			$sql ="update assigncounter
			                  set
							  userid ='".MS($this->UserId)."',
							  counterid ='".MS($this->CounterId)."',
							  contact_info = '".MS($this->Contact_info)."'
							  where 
							  userid = '".MS($this->UserId)."' AND
							  counetrid = '".MS($this->CounterId)."'";
							  
							                                 
							  
							  if(mysql_query($sql)){
								  return true;
								  }
								$this->err = mysql_error();
								return false;
				
			           }//end of main brace of update
				
			
		public function Delete(){
			  $this->Connect();
			  $sql =" delete from assigncounter where userid = '".MS($this->UserId)."' AND
			                                           counterid = '".MS($this->CounterId)."'";  
			                                                                         
																					
                 if(mysql_query($sql)){
					 return true;
					 }
					$this->err = mysql_error();
					return false;     			
			}//end of main brace of delete	
		
	    public function SelectById(){
			$this->Connect();
			$sql = "select * from assigncounter where userid ='".MS($this->UserId)."' AND
			                                          counterid = '".MS($this->CounterId)."'";                                    
			$sql = mysql_query($sql);
			while($r = mysql_fetch_row($sql)){
				  $this->UserId = $r[1];
				  $this->CounterId = $r[2];
				  $this->Contact_info = $r[3];
				
				
				}
		  
		  
		  }//end of main brace selectbyid				   	
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select user.Id AS UserId, counter.id AS CounterId, user.Id, user.FullName AS CounterPerson,  counter.name AS CounterName, assigncounter.contact_info from user, counter, assigncounter
			                    where assigncounter.userid = user.Id
								       and
									  assigncounter.counterid = counter.id";
								  
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_array($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
}//end of main brace 
		
		
	
	
	
	
	?>
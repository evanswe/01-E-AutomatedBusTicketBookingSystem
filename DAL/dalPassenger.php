	<?php
	class Passenger extends DB{
	      
		  public $Id;
		  public $Name;
		  public $Email;
		  public $Gender;
		  public $Mobile;
		  public $Payment_Type;
		  
		  public function Insert(){
			     $this->Connect();
				 $sql ="insert into passenger(name, email, gender, mobile, payment_type)
				                                             
															 values('".MS($this->Name)."',
															        '".MS($this->Email)."',
															        '".MS($this->Gender)."',
																	'".MS($this->Mobile)."',
																	'".MS($this->Payment_Type)."')"; //echo $sql;
														
														if(mysql_query($sql)){
															
															return true;
															}			
				                                          $this->err = mysql_error();
														     return false;
				 
				                           
			
			                        }//end of insert brace 
			
			
			public function Update(){
				   $this->Connect();
				   $sql ="update passenger
				                      set
									  name = '".MS($this->Name)."',
									  email = '".MS($this->Email)."',
									  gender = '".MS($this->Gender)."',
									  mobile = '".MS($this->Mobile)."',
									  payment_type = '".MS($this->Payment_Type)."'
                                        where 
										     id = '".MS($this->Id)."'";
								  
								  if(mysql_query($sql)){
									  return true;
									  
							         }			
								 $this->err = mysql_error();
								     return false;  
														   
                   		
				}//end of update brace							
		
		public function Delete(){
			   $this->Connect();
			   $sql ="delete from passenger where id = '".MS($this->Id)."'";
			   if(mysql_query($sql)){
				   
				   return true;
				   }
				   $this->err = mysql_error();
				     return false;
			
			}//end of brace of delete
		
		
		public function SelectById(){
			    $this->Connect();
				$sql = "select * from passenger where id = '".MS($this->Id)."'";
				$sql = mysql_query($sql);
				while($r = mysql_fetch_row($sql)){
					$this->Name = $r[1];
					$this->Email = $r[2];
					$this->Gender = $r[3];
					$this->Mobile = $r[4];
					$this->Payment_Type = $r[5];
					}
			
	}//end of selectbyid brace
	

			public function SelectByMobile(){
			    $this->Connect();
				$sql = "select * from passenger where mobile = '".MS($this->Mobile)."'";//echo $sql;
				$sql = mysql_query($sql);
				while($r = mysql_fetch_row($sql)){
					$this->Id = $r[0];
					$this->Name = $r[1];
					$this->Email = $r[2];
					$this->Gender = $r[3];
					$this->Mobile = $r[4];
					$this->Payment_Type = $r[5];
					}
			
	}//end of selectbyid brace
	


	public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from passenger ORDER BY name ASC";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
	
		}//end of main brace 
		
		
		
?>
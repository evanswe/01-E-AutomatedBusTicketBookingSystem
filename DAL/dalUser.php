	<?php
	class User extends DB{
		
		public $Id;
		public $FullName;
		public $Email;
		public $Password;
		public $Info;
		public $UserType;
		public $RegDate;
		
		
		
		public function Insert(){
			$this->Connect();
			$sql = "insert into user (FullName, Email, Password, Info, UserType)
                     values( '".MS($this->FullName)."',
					          '".MS($this->Email)."',
							  '".MS($this->Password)."',
							  '".MS($this->Info)."',
							  '".MS($this->UserType)."')"; //echo $sql;
							  
						if(mysql_query($sql)){
							return true;
							}	  
			              $this->err = mysql_error();
						  return false;
			
		            	}//end of insert brace
		
		
		      
		
		public function Update(){
			$this->Connect();
			$sql = "update user
			               set
			                FullName = '".MS($this->FullName)."',
							Email = '".MS($this->Email)."',
							Password = '".MS($this->Password)."',
							Info = '".MS($this->info)."',
							Usertype = '".MS($this->UserType)."'
							
							
							where Id = '".MS($this->Id)."'";
							
							
							if(mysql_query($sql)){
								
								return true;
								}
			               $this->err = mysql_error();
						   return false;

			}//end of main update
			
				
		
		public  function Delete(){
			
			$this->Connect();
			$sql = "delete from user where Id = '".MS($this->Id)."'";
			 
			 if(mysql_query($sql)){
				 return true;
				 
				 }
				 $this->err = mysql_error();
				 return false;
			
			}//end of delete brace
		
    
	
	
	   public function login(){
		   
		   $this->Connect();
		   $sql = "select * from user
		                           where  
				                   Email = '".MS($this->Email)."' AND
								   Password = '".MS($this->Password)."'";
								
		$sql = mysql_query($sql);
			if(mysql_num_rows($sql) > 0) {
				while($d = mysql_fetch_row($sql)) {
					$this->Id = $d[0];
				}				
		       return true;
			  }	
	        return false;	   
	
	  }		
		
		
	public function Select(){
		
			$a = "";
			$this->Connect();
			$sql = "select * from user";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	public function SelectById(){
		
		$this->Connect();
		$sql = "select * from user where Id ='".MS($this->Id)."'";
		$sql = mysql_query($sql);
		while($r = mysql_fetch_row($sql)){
			
			$this->FullName = $r[1];
			$this->Email = $r[2];
			$this->Password = $r[3];
			$this->Info = $r[4];
			$this->UserType =$r[5];
			$this->RegDate = $r[6];
			
			
			
			}
			
		}	
		
		
}//end of main brace
	
	?>
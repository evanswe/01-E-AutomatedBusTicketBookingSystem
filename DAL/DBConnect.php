	<?php
	class DB{
		public $err;
		protected function Connect(){
			mysql_connect("localhost", "root", "");
			mysql_select_db("eticket");
			
			}
		}
	
	
	
	?>
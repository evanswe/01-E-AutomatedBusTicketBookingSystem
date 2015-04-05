<!-- Inner Container Start -->
<script>
	$(document).ready(function(e) {
		setTimeout(function() {
			$('.message').slideUp("slow");
		}, 5000); 
        
		$(".icol-cross").click(function(){
			$(this).parents(".message").slideUp("slow");
		});
    });
</script>

 <div class="container">
            
	<?php
	$busseats = new BusSeats();
	$msg = "";
	$err = 0;
	if(isset($_POST["sub"])){
		if($err == 0){
			$busseats->SeatName = $_POST["name"];
			if($busseats->Insert()){
				$msg = "Insert Suceessfully";
				}else{
					$msg = "Failed";
					}
			
			}//error brace
		
		}//main brace sub
	
	
     ?>
     
     
     
     <?php 
	   if($msg == "Insert Suceessfully"){
	   ?>
        <div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-correct">
                    	<span> <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>
          <?php }else if($msg == "Failed"){ ?>
            <div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-correct">
                    	<span> <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>
     <?php }?>
     
 <!---------main header------------->
     
 <div class="mws-panel grid_8">       
                
   <div class="mws-panel-header">
                   
          	<span>Bus Seats Add</span>
                        
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post">
                        
                        
                            <div class="mws-form-inline">
                           
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Seat Name</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="name" id="name">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgFullName">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                    		<div class="mws-button-row">
                    			<input type="submit" value="Submit" name="sub" class="btn btn-success">
                    			<input type="reset" value="Reset" class="btn ">
                               
                    		</div>
                        </form>
                    </div>
                </div>
            
          <!-------complte from---------->
                    
          
               <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Table with Toolbar</span>
                    </div>
                    <div class="mws-panel-toolbar">
                    
						<div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label>
                            <div class="btn-group">
                                    <span class="btn"><i class="icol-find"></i><input style="border: none; padding:0; font-weight:bold" type="submit" name="SEARCH" class="btn btn-small" value="SEARCH" /></span>
                                    <span class="btn"><i class="icol-find"></i><input style="border: none; padding:0; font-weight:bold" type="submit" name="SEARCH" class="btn btn-small" value="SEARCH ALL" /></span>
                                    
                            </div>
                        </div>                    
                    </div>

                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                	<th>Seat Name</th>
                                     <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                          
                            <?php
                             $r = $busseats->Select();
							 if($r !=""){
								 for($i=0; $i<count($r); $i++){
							
							?>



                            <tbody>
                                <tr>
                                	<td><?php echo $r[$i][1]; ?></td>
                                    <td><a title="Edit" href="?a=busseatsEdit&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                    <td><a title="Delete" href="?a=busseatsDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                 </tr>
                                
                                
                            </tbody>
                             <?php }
							  }?>
                             
                        </table>
                    </div>    	
                </div>    
          
          
          
          
          

                
                
          
               
                
                            
            	
    </div><!--div main content-->
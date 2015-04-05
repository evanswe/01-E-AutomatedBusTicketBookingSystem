<!-- Inner Container Start -->
<style>
	.selected{
		color:#063;
		font-weight: bold;
	}
</style>
<script>
	function Page(){
			setTimeout(function() {
				$('.message').slideUp("slow");
			}, 5000); 
			
			$(".icol-cross").click(function(){
				$(this).parents(".message").slideUp("slow");
			});
			$( "#datepicker" ).datepicker();		
			
			$("#datepicker").keyup(function(){
				$(this).val("");
			});
		
	}

	$(document).ready(function(e) {
		Page();		
    });
	
	
</script>

 <div class="container">
            
	<?php
	$busseat = new BusSeats();
	$counter = new Counter();
	$departure = new DepartureConfig();
	$assignseats = new AssignSeats();
    $msg ="";
	$err = 0;
	if(isset($_POST["sub"])){
		if($err == 0){
		  $assignseats->CounterId = $_POST["counterid"];
		  $assignseats->Departure_ConfigId = $_POST["departureconfig"];
		  $assignseats->SeatId = $_POST["seatid"];
		  if($assignseats->Insert()){
			  $msg = "Insert Suceessfully";
			  }else{
				$msg ="Failed";  
				  }
		   
		 }//error brace
	}//mani brace
	
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
                   
          	<span>Assign Seats Add </span>
                        
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post">
                        
                        
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Counter Name</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <select name="counterid" class="mws-select2 large">
                                    
                                    			<option value="">Select Counter</option>
                                                <?php 
                                        				Option($counter->Select());
												?>
                                      				
                                  			    </select>
                                                
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgFullName">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Departure Name </label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <select name="departureconfig" class="mws-select2 large">
                                    
                                    			<option value="">Select Departure</option>
                                                <?php 
                                        				Option($departure->Select());
												?>
                                      				
                                  			    </select>
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Seat Name</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <select name="seatid" class="mws-select2 large">
                                    				<option value="">Select Seat</option>
                                                     <?php 
                                        				Option($busseat->Select());
												     ?>
                                                    
                                      				
                                  			    </select>
                                                
                                            </div>
                                            <div class="mws-form-col-3-8">
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


          <!-------complete from---------->
          
               <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Table with Toolbar</span>
                    </div>
                    <div class="mws-panel-toolbar">
                    	<form action="" method="post">
						<div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label>
                            <div class="btn-group">
                                    <span class="btn"><i class="icol-find"></i><input style="border: none; padding:0; font-weight:bold" type="submit" name="search" class="btn btn-small" value="SEARCH" /></span>
                                    <span class="btn"><i class="icol-find"></i><input style="border: none; padding:0; font-weight:bold" type="submit" name="SEARCH" class="btn btn-small" value="SEARCH ALL" /></span>
                            </div>
                        </div>                    
                        </form>
                    </div>



                    <?php 
					if(isset($_POST["search"])){
					?>
                    <script>
						$(document).ready(function(e) {
                            Page();

							$("#data-table tr").each(function(index, element) {
									if(!$(this).hasClass("heading")){
										var rowIndex = $(this).index();
										if(rowIndex>3){
											$(this).hide();
										}
									}
							});

							$(".pagignation").click(function(){
								$(".container").children().each(function(index, element) {
									$(this).removeClass("selected");                
								});
								$(this).addClass("selected");
								var val = $(this).attr("data-index");
									var start = parseInt(val);
									var end = start+2;
									$("#data-table tr").each(function(index, element) {
										if(!$(this).hasClass("heading")){
											var rowIndex = $(this).index();
											if(rowIndex>=start && rowIndex<=end){
												$(this).show();
											}else{
												$(this).hide();
											}
										}
									});
								
							});
                        });
					</script>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table" id="data-table">
                                <tr class="heading">
                                	<th>Counter Name</th>
                                    <th>Departure Name</th>
                                    <th>Seat Name</th>
                                    
                                </tr>

                            <?php
                             $r = $assignseats->Select();
							 $totalRow = count($r);
							 if($r != ""){
								 for($i=0; $i<count($r); $i++){
							?>
                                <tr>
                                	<td><?php echo $r[$i][1]; ?></td>
                                    <td><?php echo $r[$i][2]; ?></td>
                                    <td><?php echo $r[$i][3]; ?></td>
                                                                    
                                    <td><a title="Edit" href="?a=assignseatsEdit&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                    <td><a title="Delete" href="?a=assignseatsDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                 </tr>
                                
                             <?php }
							  }
							 ?>
                             
                        </table>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                            <span class="container">
                            <?php 
								$page = 0;
								for($j=0; $j<$totalRow; $j+=3){
									$page++;
							?>
                                <p data-index="<?php echo $j+1; ?>" class="btn pagignation"><?php echo $page; ?></p>
                            <?php }?>
                            </span>
                            </div>
                        </div>
                      <?php }?>
                    </div>    	
                </div>    
          
          
          
          
   </div><!--div main content-->
    
    
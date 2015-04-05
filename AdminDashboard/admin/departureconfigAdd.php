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
	 $departure = new DepartureConfig();
	 $counter = new Counter();
	 $bus = new Bus();
	 $station = new Station();
	 $msg ="";
	 $err =0;
			
	 if(isset($_POST["sub"])){
		 //echo $_POST["via_counters_array"];
		 if($err == 0){
			 $date = date("Y-m-d",strtotime($_POST["date"]));
			 $departure->BusId = $_POST["busid"];
			 $departure->CoachNumber = $_POST["coachno"];
			 $departure->StationFrom = $_POST['station_from'];
			 $departure->StationTo = $_POST["station_to"];
             $departure->BusFare = $_POST["busfare"];
			 $departure->ViaCountersArray = $_POST["via_counters_array"];
			 $departure->ViaLocation = $_POST["vialocation"];
			 $departure->JourneyType = $_POST["journey_type"];
			 $departure->StartTime = $_POST["starttime"];
			 $departure->EndTime = $_POST["endtime"];
			 $departure->Date = $date;
			 if($departure->Insert()){
				     $msg ="Insert Suceessfully";
			      }else{
					  $msg="Failed";
					  }
				
			 }//end of error brace
	 
		 }//end of amin brace
	 
	 
	
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
                   
          	<span>Departure Add </span>
                        
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post">
                        
                        
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Select Coach</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <select name="busid" data-placeholder="Select Bus" class="mws-select2 large">
                                    			<option></option>
                                      				<?php 
                                        				Option($bus->Select());
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
                                    <label class="mws-form-label">CoachNumber</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="coachno" id="coachno">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Station From</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                
                                                <select name="station_from" data-placeholder="Select Start From" class="mws-select2 large">
                                    				<option></option>
                                      				<?php
														Option($station->Select());
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
                                    <label class="mws-form-label">Station To</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                            
                                                <select data-placeholder="Select Start To" name="station_to" class="mws-select2 large">
	                                    			<option></option>
                                      				<?php 
                                        				Option($station->Select());
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
                                    <label class="mws-form-label">Bus Fare</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="busfare" id="busfare">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                            
                            
                            
                           <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Via Counter</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                
 											<select class="mws-select2 large" name="via_counters_array" multiple size="5">
                                            	<?php 
													//Option($counter->Select());
													$r = $counter->Select();
														for($i=0;$i<count($r);$i++){
															echo "<option value='".$r[$i][0]."'>".$r[$i][1]."</option>";
														}
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
                                    <label class="mws-form-label">ViaLocation</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="vialocation" id="vialocation">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                              
                            
                            
                              <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">JourneyType</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                               <select name="journey_type" class="form-control">
                                                	<option value="">Select</option>
                                                    <option value="Special">Special</option>
                                                    <option value="NonSpecial">Non Special</option>
                                                    
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
                                    <label class="mws-form-label">Assaign Date</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="date" id="datepicker">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                              <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">StartTime</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="starttime" id="starttime">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                 
                                 
                                 
                               <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">EndTime</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="endtime" id="endtime">
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
                                	<th>Bus Name</th>
                                    <th>Coach Number</th>
                                    <th>Starting From</th>
                                    <th>Starting To</th>
                                    <th>Bus Fare</th>
                                    <th>Counter Name</th>
                                    <th>Location</th>
                                    <th>Journey Type</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Assaign Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                            <?php
                             $r = $departure->Select();
							 $totalRow = count($r);
							 if($r != ""){
								 for($i=0; $i<count($r); $i++){
							?>
                                <tr>
                                	<td><?php echo $r[$i]["BusName"]; ?></td>
                                    <td><?php echo $r[$i]["CoachNo"]; ?></td>
                                    <td><?php echo $r[$i]["StationFrom"]; ?></td>
                                    <td><?php echo $r[$i]["StationTo"]; ?></td>
                                    <td><?php echo $r[$i]["BusFare"]; ?></td>
                                    <td><?php echo $r[$i]["via_counters_array"]; ?></td>
                                    <td><?php echo $r[$i]["Location"]; ?></td>
                                    <td><?php echo $r[$i]["JourneyType"]; ?></td>
                                    <td><?php echo $r[$i]["TimeStart"]; ?></td>
                                    <td><?php echo $r[$i]["EndTime"]; ?></td>
                                    <td><?php echo $r[$i]["Date"]; ?></td>                                    
                                    <td><a title="Edit" href="?a=departureconfigEdit&id=<?php echo $r[$i]["id"]; ?>"><i class="icon-edit"></i></a></td>
                                    <td><a title="Delete" href="?a=departureconfigDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-remove"></i></a></td>
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
    
    
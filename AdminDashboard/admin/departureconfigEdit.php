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
			
	 if(isset($_POST["update"])){
		 
		 if($err == 0){
			 $departure->Id = $_POST["id"];
			 $departure->BusId = $_POST["busid"];
			 $departure->CoachNumber = $_POST["coachno"];
			 $departure->StationFrom = $_POST['station_from'];
			 $departure->StationTo = $_POST["busfare"];
			 $departure->ViaCountersArray = $_POST["via_counters_array"];
			 $departure->ViaLocation = $_POST["vialocation"];
			 $departure->JourneyType = $_POST["journey_type"];
			 $departure->Date = $date;
			 $departure->StartTime = $_POST["starttime"];
			 $departure->EndTime = $_POST["endtime"];
			
			 if($departure->Update()){
				     $msg ="Update Suceessfully";
			      }else{
					  $msg="Failed";
					  }
				
			 }//end of error brace
	 
		 }//end of amin brace
	 
	   $departure->Id = $_GET["id"];
	   $departure->SelectById();
	
     ?>
     
     
     
     <?php 
	   if($msg == "Update Suceessfully"){
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
                        
                    	<<form action="" class="mws-form" method="post"">
                        <input type="hidden" id="id" name="id" value="<?php echo $_GET["id"]; ?>" />
                        
                        
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Select Bus</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                            <select name="busid" data-placeholder="Select Bus" class="mws-select2 large">
                                    			 <option value="">Select Bus</option>
                                      				<?php 
													$r=$bus->Select();
					                                Selected($r,$departure->BusId);
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
                                                <input type="text" name="coachno" value="<?php echo $departure->CoachNumber; ?>" id="coachno">
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
													$r=$station->Select();
					                                Selected($r,$departure->StationFrom);
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
	                                    			<option>Select </option>
                                      				<?php 
													$r=$station->Select();
                                        				Selected($r,$departure->StationTo);
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
                                                <input type="text" name ="busfare" value="<?php echo $departure->BusFare; ?>" id="vialocation">
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
													$rr = $counter->Select();
					                                Selected($rr,$departure->ViaCountersArray);
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
                                                <input type="text" name ="vialocation" value="<?php echo $departure->ViaLocation; ?>" id="vialocation">
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
                                               
                                            <select data-placeholder="Select" name="journey_type" class="mws-select2 large">
                                                     <option value="">Select</option>
                                                           <?php 
                                                                if( $departure->JourneyType  == "Special"){
                                                             ?>
                                                      <option value="Special" selected="selected">Special</option>
                                                      <option value="NonSpecial">NonSpecial</option>
                                                     <?php }else{?>
                                                      <option value="Special">Special</option>
                                                      <option value="NonSpecial" selected="selected">NonSpecial</option>
                                                     <?php }?>
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
                                                <input type="text" name ="date" value="<?php echo $departure->Date; ?>" id="datepicker">
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
                                                <input type="text" name ="starttime" value="<?php echo  $departure->StartTime; ?>" id="starttime">
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
                                                <input type="text" name ="endtime" value="<?php echo $departure->EndTime; ?>" id="endtime">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                      
                             
                            
                            
                              
                            
                    		<div class="mws-button-row">
                    			<input type="submit" value="Submit" name="update" class="btn btn-success">
                    			<input type="reset" value="Reset" class="btn ">
                               
                    		</div>
                        </form>
                    </div>
                </div>


    </div> <!--div main content-->
    
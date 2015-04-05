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

  $bus = new Bus();
  $Err = "";
  $msg = "";
  if(isset($_POST["update"])){
	  
	       if($err == 0){
			   $bus->Id = $_POST["id"];
			   $bus->Name = $_POST["name"];
			   $bus->Bus_No = $_POST["bus_no"];
			   $bus->Bus_Type = $_POST["bus_type"];
			   $bus->Brand = $_POST["brand"];
			   $bus->Other_Info = $_POST["other_info"];
			   $bus->Seat = $_POST["seat"];
			   if($bus->Update()){
				   $msg = "Update Succesfully ";
				   }else{
				   $msg ="Failed";
				   }
				   
			   }//error brace
	  
	  }//main brace of update 
	   
	   $bus->Id = $_GET["id"];
	   $bus->SelectById();




?>
<?php 
   if($msg =="Update  Succesfully"){
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
         
 <div class="mws-panel grid_8">       
                
   <div class="mws-panel-header">
                    
                    
                    
          	<span>Bus Edit </span>
                        
                  </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post" name="myform" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?php echo $_GET["id"]; ?>" />
                        
                        
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">BusName</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="name" value="<?php echo $bus->Name; ?>" id="name">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgFullName">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">BusNumber</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="bus_no" value="<?php echo $bus->Bus_No; ?>" id="bus_no">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                         <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Bus_Type</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                 <select name="bus_type" class="mws-select2 large">
                                                	<option value="">Select</option>
                                                    <?php
                                                    if($bus->Bus_Type == "AC"){
													
													?>
                                                    <option value="AC" selected="selected">AcService</option>
                                                    <option value="NonAC">NonAcService</option>
                                                    <?php }else{ ?>
                                                    <option value="AC">AcService</option>
                                                    <option value="NonAC" selected="selected">NonAcService</option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              <!--for form validation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                       <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Brand</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="brand" value="<?php echo $bus->Brand;  ?>" id="brand">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              <!--for form velidation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                         
                         
                         
                         
                                                     
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Info_	Other</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <input type="text" name="other_info" value="<?php  echo $bus->Other_Info; ?>" id="other_info">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              <!--for form velidation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                          <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Seat</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <input type="text" name="seat" value="<?php echo $bus->Seat; ?>" id="seat">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              <!--for form velidation-->
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
                
             
                

            	
    </div><!--div main content-->
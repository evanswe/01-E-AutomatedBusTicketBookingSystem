<!-- Inner Container Start -->
<script>
	$(document).ready(function(e) {
		setTimeout(function() {
			$('.message').slideUp("slow");
		}, 5000); 
        
		$(".icol-cross").click(function(){
			$(this).parents(".message").slideUp("slow");
		});
		
		
		$(".edit").click(function(){
			//clear all previous tr color
			$(this).parents("table").find("tr").each(function(index, element) {
                $(this).css("background-color", "#efefef");
            });
			
			//add color to clicked row
			$(this).parents("tr").css("background-color", "#9FC");
			var id = $(this).attr("data-inline");

			var busName = $(this).parents("tr").find(".bus-name").text();
			var busNumber = $(this).parents("tr").find(".bus-number").text();
			var busType = $(this).parents("tr").find(".bus-type").text();
			var busBrand = $(this).parents("tr").find(".bus-brand").text();
			var busOtherInfo = $(this).parents("tr").find(".bus-other-info").text();
			var busSeat = $(this).parents("tr").find(".bus-seat").text();

			$("#id-edit").val(id);
			$("#name").val(busName);
			$("#bus_no").val(busNumber);
			$("#s2id_busType").children().find("span").text(busType);//Extra-ordinary case
			$("#brand").val(busBrand);
			$("#other_info").val(busOtherInfo);
			$("#seat").val(busSeat);
			
			$("#update").show();
			$("#save").hide();
			
			//To check when click on edit button
			validate();
			$(document).scrollTop(80);
		});
    });
	
	
	
	function validate(){
		var err = 0;
		
			var busName = $("#name").val();
			var busNo = $("#bus_no").val();
			var busType = $("#s2id_busType").children().find("span").text();//Extra-ordinary case
			var busBrand = $("#brand").val();
			var busOtherInfo = $("#other_info").val();
			var busSeat = $("#seat").val();
			
			
			if(busName.length < 2){
				err++;
				$("#msgName").html("<font color='red'>Must be greater than 3 characters</font>");
			}else{
				$("#msgName").html("");
			}
		
			if(busNo == ""){
				err++;
				$("#msgBusNo").html("<font color='red'>Can't leave blank</font>");
			}else{
				$("#msgBusNo").html("");
			}
		
			if(busType == "Select"){
				err++;
				$("#msgBusType").html("<font color='red'>Please select</font>");
			}else{
				$("#msgBusType").html("");
			}
		
			if(busBrand.length < 2){
				err++;
				$("#msgBrand").html("<font color='red'>Must be greater 2 characters</font>");
			}else{
				$("#msgBrand").html("");
			}
			
			if(busSeat == ""){
				err++;
				$("#msgSeat").html("<font color='red'>Can't leave blank</font>");
			}else{
				$("#msgSeat").html("");
			}
			
			if(err>0){
				return false;
			}else{
				return true;
			}
			
		
	}
</script>

<style>
	.edit{
		color:#06F;
		cursor:pointer;
	}
	.delete{
		color:red;
		cursor:pointer;
	}
</style>

 <div class="container">
            

<?php

  $bus = new Bus();
  $Err = "";

  if(isset($_POST["save"])){
	      if($err == 0){
			  $bus->Name = $_POST["name"];
			  $bus->Bus_No = $_POST["bus_no"];
			  $bus->Bus_Type = $_POST["bus_type"];
			  $bus->Brand = $_POST["brand"];
			  $bus->Other_Info = $_POST["other_info"];
			  $bus->Seat = $_POST["seat"];
			  
			 if($bus->Insert()){
					$msg = "Insert Successfully";
			 }else{
				$msg = "Failed";
			 }	
		}
	  
	}//end of insert section

	
	if(isset($_POST["update"])){
		      $bus->Id = $_POST["id-edit"];
			  $bus->Name = $_POST["name"];
			  $bus->Bus_No = $_POST["bus_no"];
			  $bus->Bus_Type = $_POST["bus_type"];
			  $bus->Brand = $_POST["brand"];
			  $bus->Other_Info = $_POST["other_info"];
			  $bus->Seat = $_POST["seat"];
			  
			  if($bus->Update()){
				  $msg = "Successfully Updated";
			  }else{
				  $msg = "Failed";
			  }
		
	}//End of update section
	
	
	if(isset($_POST["delete"])){
		$bus->Id = $_POST["deleteId"];
		if($bus->Delete()){
			$msg = "Successfully Deleted";
		}else{
			$msg = "Failed";
		}
	}


?>

 <?php
   if($msg == "Insert Successfully" || $msg == "Successfully Updated" || $msg == "Successfully Deleted"){
 
 ?>
  			<div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-correct">
                    	<span> <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>

            <?php }else if($msg == "Failed"){?>
            <div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-correct">
                    	<span>  <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>
            <?php }?>


         
 <div class="mws-panel grid_8">       
                
   <div class="mws-panel-header">
                    
                    
                    
          	<span>Bus Add </span>
                        
                       
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post" onsubmit="return validate()">
                        
                    		<input type="hidden" name="id-edit" id="id-edit" />
                            <div class="mws-form-inline">
                           
                                <div class="mws-form-row">
                                    <label class="mws-form-label">BusName</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="name" id="name">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgName">
                                               
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
                                                <input type="text" name ="bus_no" id="bus_no">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgBusNo">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                         <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Bus Type</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                            
                                                 <select name="bus_type" id="busType" class="mws-select2 large">
                                                	<option>Select</option>
                                                    <option value="AC">AC</option>
                                                    <option value="Non AC">Non AC</option>
                                                 </select>
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgBusType">
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
                                                <input type="text" name="brand" id="brand">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgBrand">
                                              <!--for form velidation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                         
                         
                         
                         
                                                     
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Other Info</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <input type="text" name="other_info" id="other_info">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgOtherInfo">
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
                                             <input type="text" name="seat" id="seat">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgSeat">
                                              <!--for form velidation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            
                            
                    		<div class="mws-button-row">
                    			<input type="submit" value="Submit" name="save" id="save" class="btn btn-success">
                    			<input type="submit" value="UPDATE" style="display:none" id="update" name="update" class="btn btn-success">
                    			<input type="reset" value="Reset" class="btn ">
                               
                    		</div>
                        </form>
                    </div>
                </div>
                
                
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
                                    <th>Bus Number</th>
                                	<th>Bus Name</th>
                                    <th>Bus Type</th>
                                    <th>Brand</th>
                                    <th>OtherInfo</th>
                                    <th>Seat</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                           <?php 
								$r= $bus->Select();
								if($r!= ""){
									for($i=0; $i<count($r); $i++){
										
							?>



                            <tbody>
                                <tr>
                                    <td class="bus-name"><?php echo $r[$i][1]; ?></td>
                                    <td class="bus-number"><?php echo $r[$i][2]; ?></td>
                                	
                                    <td class="bus-type"><?php echo $r[$i][3]; ?></td>
                                    <td class="bus-brand"><?php echo $r[$i][4]; ?></td>
                                    <td class="bus-other-info"><?php echo $r[$i][5]; ?></td>
                                    <td class="bus-seat"><?php echo $r[$i][6]; ?></td>
                                    <td><span data-inline="<?php echo $r[$i][0]; ?>" class="icon-edit edit"></span></td>
                                    <td>
                                    <form action="" method="post" onsubmit="return confirm('Are you sure!!')">
                                    	<input type="hidden" name="deleteId" id="deleteId" value="<?php echo $r[$i][0]; ?>" />
                                    	<input type="submit" name="delete" class="btn btn-default" style="border:none; background-color:transparent; color:#bd2323" value="x"/>
                                    </form>
                                    </td>
                                 </tr>
                            </tbody>
                             <?php }
							  }?>
                             
                        </table>
                    </div>    	
                </div>    
          
          
            	
    </div><!--div main content-->
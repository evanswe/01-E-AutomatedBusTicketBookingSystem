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
			$(this).parents("table").find("tr").each(function(index, element) {
                $(this).css("background-color", "#efefef");
				});
			
		$(this).parents("tr").css("background-color", "#9FC");
		
			var id = $(this).attr("data-inline");
			//alert(id);
			var counterName = $(this).parents("tr").find(".counter-name").text();
			var counterAddress = $(this).parents("tr").find(".counter-address").text();
			var counterAddress = $(this).parents("tr").find(".counter-address").text();
			var contactInformation = $(this).parents("tr").find(".contact-information").text();
			var status = $(this).parents("tr").find(".status").text();
			//alert(status);
			
			
			$("#id-edit").val(id); 
			$("#name").val(counterName);
			$("#address").val(counterAddress);
			$("#telephone_contact").val(contactInformation);
			$("#status").val(status);
			$("#update").show();
			$("#sub").hide();
			//$(document).scrollTop(20)
			
			});
    });
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
        $counter = new Counter();
        $Err ="";
        $msg = "";
		if(isset($_POST["sub"])){
			     if($err == 0){
					 
					 $counter->Name = $_POST["name"];
					 $counter->Address = $_POST["address"];
					 $counter->Telephone_Contact = $_POST["telephone_contact"];
					 $counter->Status = $_POST["status"];
					 if($counter->Insert()){
						 $msg = "Insert Suceessfully";
						 }else{
							 $msg ="Failed";
							 }
					 }//error brace
			}//end of main brace of 
			
			
	if(isset($_POST["update"])){
		      $counter->Id = $_POST["id-edit"];
			  $counter->Name = $_POST["name"];
			  $counter->Address = $_POST["address"];
			  $counter->Telephone_Contact = $_POST["telephone_contact"];
			  $counter->Status = $_POST["status"];
			  
			  
			  if($counter->Update()){
				  $msg = "Successfully Updated";
			  }else{
				  $msg = "Failed";
			  }
		
	}//End of update section		
			
			
     ?>
     
     
     
     <?php 
	   if($msg == "Insert Suceessfully" || $msg == "Successfully Updated"){
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
                   
          	<span>Counter Add </span>
                        
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post">
                      <input type="text" name="id-edit" id="id-edit" />
                        
                        
                            <div class="mws-form-inline">
                           
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Counter Name</label>
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
                            

                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Counter Address</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="address" id="address">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                        
                        
                       <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Contact Information</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="telephone_contact" id="telephone_contact">
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
                                    <label class="mws-form-label">Status</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <input type="text" name="status" id="status">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              <!--for form velidation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            
                            
                    		<div class="mws-button-row">
                    			<input type="submit" value="Submit" name="sub" id="sub" class="btn btn-success">
                                <input type="submit" value="Update" style="display:none" name="update" id="update" class="btn btn-success">
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
                                	<th>Conter Name</th>
                                    <th>Conter Address</th>
                                    <th>Telephone Contact</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                           <?php 
								$r= $counter->Select();
								if($r!= ""){
									for($i=0; $i<count($r); $i++){
										
							?>



                            <tbody>
                                <tr>
                                	<td class="counter-name"><?php echo $r[$i][1]; ?></td>
                                    <td class="counter-address"><?php echo $r[$i][2]; ?></td>
                                    <td class="contact-information"><?php echo $r[$i][3]; ?></td>
                                    <td class="status"><?php echo $r[$i][4]; ?></td>
                                    <td><span data-inline="<?php echo $r[$i][0]; ?>" class="icon-edit edit"></span>Evan</td>
                                    <td><a title="Delete" href="?a=counterDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                 </tr>
                                
                            </tbody>
                             <?php }
							  }?>
                             
                        </table>
                    </div>    	
                </div>    
          
          
          
          
                
                
          
          
          
               
                
                            
            	
    </div><!--div main content-->
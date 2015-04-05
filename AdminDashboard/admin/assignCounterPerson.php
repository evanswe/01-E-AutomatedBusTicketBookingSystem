
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
		var id = $(this).attr("data-inline");
		var counterPerson = $(this).parents("tr").find(".counter-person").text();
		alert(counterPerson);
		
		$("#id-edit").val(id); 
		$("#contact_info")
		$("#s2id_counterperson").val(counterPerson);
		
		
		
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
        $assign = new  AssignCounterPerson();
		$user = new User();
		$counter = new Counter();
        $Err ="";
        $msg = "";
		if(isset($_POST["sub"])){
			if($err == 0){
				$assign->UserId = $_POST["userid"];
				$assign->CounterId = $_POST["counterid"];
				$assign->Contact_info = $_POST["contact_info"];
				if($assign->Insert()){
					$msg = "Insert Succesfully";
					}else{
						$msg="Failed";
					}
				
				
				
				} //end of error brace
			
		} //end of main brace of insert
          
          
        
     ?>
         
         
  <?php
        if($msg == "Insert Succesfully"){
	 ?>    
           <div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-correct">
                    	<span>  <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>
       <?php }else if($msg == "Failed"){ ?>
       
                    <div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-error">
                    	<span>  <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>
		<?php }?>

         
 <div class="mws-panel grid_8">       
                
   <div class="mws-panel-header">
                    
                    
                    
          	<span>AssignCounterPerson</span>
                        
                        
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post">
                        <input type="text" name="id-edit" id="id-edit">
                        
                        
                            <div class="mws-form-inline">
                           
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Couter Person</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <select name="userid" id="counterperson" class="mws-select2 large">
                                    
                                                    <option value>Select CounterPerson</option>
                                                        <?php 
                                                            Option($user->Select());
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
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  
                           
                          <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Mobile Number</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <input type="text" name="contact_info" id="contact_info">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              <!--for form velidation-->
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
                                	<th>Assign Person</th>
                                    <th>Counter</th>
                                    <th>Telephone Contact</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                           <?php 
								$r= $assign->Select();
								if($r!= ""){
									for($i=0; $i<count($r); $i++){
										
							?>



                            <tbody>
                                <tr>
                                	<td class="counter-person"><?php echo $r[$i][1]; ?></td>
                                    <td><?php echo $r[$i][2]; ?></td>
                                    <td><?php echo $r[$i][3]; ?></td>
                                    <td><span data-inline="<?php echo $r[$i][0]; ?>"><i class="icon-edit edit"></i></span></td>
                                    <td><a title="Delete" href="?a=assigncounterpersonDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                 </tr>
                                
                                
                            </tbody>
                             <?php }
							  }?>
                             
                        </table>
                    </div>    	
                </div>    
          
          
          
          
                
                
                
                
                
                
                
                
                
                 
          
          
          
               
                
                            
            	
    </div><!--div main content-->>
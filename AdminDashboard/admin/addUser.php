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
			//alert(id);
			var fullName = $(this).parents("tr").find(".full-name").text();
			var email = $(this).parents("tr").find(".email").text();
			var Pass = $(this).parents("tr").find(".passwords").text();
			var info = $(this).parents("tr").find(".info").text();
			var userType = $(this).parents("tr").find(".user-type").text();
			
			//alert(userType);
			
			$("#id-edit").val(id);
			$("#fullName").val(fullName);
			$("#email").val(email);
			$("#password").val(Pass);
			$("#info").val(info);
			$("#s2id_utype").children().find("span").text(userType);
			$("#update").show();
			$("#sub").hide();
			$(document).scrollTop(0);
			
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
        $user = new User();
		$Err = "";
		
		if(isset($_POST["sub"])){
			
			if($err == 0){
				$user->FullName = $_POST["fullName"];
				$user->Email = $_POST["email"];
				$user->Password = $_POST["password"];
				$user->Info = $_POST["info"];
				$user->UserType = $_POST["user_type"];
				
			    if($user->Insert()){
						$msg = "Insert Successfully";
						}else{
						$msg = "Failed";
				      }
				}//brace2
      }
	  
	  
		 if(isset($_POST["update"])){
		      $user->Id = $_POST["id-edit"];
			  $user->FullName = $_POST["fullName"];
			  $user->Email = $_POST["email"];
			  $user->Password = $_POST["password"];
			  $user->Info = $_POST["info"];
			  $user->UserType = $_POST["user_type"];
			  
			  
			  if($user->Update()){
				  $msg = "Successfully Updated";
			  }else{
				  $msg = "Failed";
			  }
		
	}//End of update section		
			
		 
		 

   ?>
   			
      <?php 
	  	if($msg == "Insert Successfully" || $msg == "Successfully Updated"){
	  ?>
            <div class="mws-panel grid_8 message">
					<div class="mws-panel-message-header-correct">
                    	<span>  <?php echo $msg; ?> </span>
                        <span style="float:right">
                                <i class="icol-cross"></i>
                        </span>
                    </div>           
            </div>
       <?php }else if($msg == "Failed"){?>

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
                    	<span>User Registration </span>
                    </div>
                   
                    <div class="mws-panel-body no-padding">
                    	<div class="grid_8 first-element"></div>
                        
                    	<form action="" class="mws-form" method="post">
                        <input type="text" name="id-edit" id="id-edit" />  
                        
                            <div class="mws-form-inline">
                           
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Full Name</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name="fullName" id="fullName">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgFullName">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Email</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" name ="email" id="email">
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                         <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Password</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="password" placeholder="Enter Password" name="password" id="password">
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
                                    <label class="mws-form-label">Information</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" placeholder="Enter Info" name="info" id="info">
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
                                    <label class="mws-form-label">User Type</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
												<select name="user_type" id="utype" class="mws-select2">
                                                	<option>Select User Type</option>
                                                    <option value="operator">Counter Operator</option>
                                                    <option value="admin">Head Admin</option>
                                                 </select>
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
                                	<th>FullName</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Information</th>
                                    <th>User Type</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                           <?php 
								$r= $user->Select();
								if($r!= ""){
									for($i=0; $i<count($r); $i++){
										
							?>



                            <tbody>
                                <tr>
                                	<td class="full-name"><?php echo $r[$i][1]; ?></td>
                                    <td class="email"><?php echo $r[$i][2]; ?></td>
                                    <td class="passwords"><?php echo $r[$i][3]; ?></td>
                                    <td class="info"><?php echo $r[$i][4]; ?></td>
                                    <td class="user-type"><?php echo $r[$i][5]; ?></td>
                                     <td><span data-inline="<?php echo $r[$i][0]; ?>" class="icon-edit edit"></span></td>
                                      <td><a title="Delete" href="?a=counterDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                 </tr>
                                
                                
                            </tbody>
                             <?php }
							  }?>
                             
                        </table>
                    </div>    	
                </div>                
            	
    </div><!--div main content-->
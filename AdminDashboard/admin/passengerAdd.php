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
	$passenger = new Passenger();
	$msg = "";
	$err = 0;
	if(isset($_POST["sub"])){
		if($err == 0){
		   $passenger->Name = $_POST["name"];
		   $passenger->Email = $_POST["email"];
		   $passenger->Gender = $_POST["gen"];
		   $passenger->Mobile  = $_POST["mobile"];
		   $passenger->Payment_Type = $_POST["payment_type"];
		   if($passenger->Insert()){
			   $msg="Insert Suceessfully";
			   }else{
				   $msg ="Failed";
				   }
		}
		}//main brace
	
	
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
                                    <label class="mws-form-label">Passenger Name</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                 <input type="text" placeholder="Enter Name" name="name" id="name">
                                            </div>
                                            <div class="mws-form-col-3-8" id="msgFullName">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Email </label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                             <input type="text" placeholder="Enter Ur Email" name="email" id="email">
                                               
                                            </div>
                                            <div class="mws-form-col-3-8">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Gender</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-list inline">
                                                <input type="radio" name="gen"   value="m" />Male<input type="radio" name="gen"  value="f" />Female 
                                            </div>
                                            <div class="mws-form-col-3-8">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        
                        
                        <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Mobile</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <input type="text" placeholder="Enter Ur Mobile Number" name="mobile" id="mobile">
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
                                    <label class="mws-form-label">Payment Type</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-3-8">
                                                <select name="payment_type" class="mws-select2">
                                                	<option>Select Payment Type</option>
                                                    <option value="bkash">Bkash</option>
                                                    <option value="credit">Credit Card</option>
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
                                	<th>Passenger Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Mobile Number</th>
                                    <th>Payement_Type</th>
                                    
                                </tr>

                            <?php
                             $r =$passenger->Select();
							 $totalRow = count($r);
							 if($r != ""){
								 for($i=0; $i<count($r); $i++){
							?>
                                <tr>
                                	<td><?php echo $r[$i][1]; ?></td>
                                    <td><?php echo $r[$i][2]; ?></td>
                                    <td><?php echo $r[$i][3]; ?></td>
                                     <td><?php echo $r[$i][4]; ?></td>
                                      <td><?php echo $r[$i][5]; ?></td>
                                                                    
                                    <td><a title="Edit" href="?a=passengerEdit&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
                                    <td><a title="Delete" href="?a=passengerDel&id=<?php echo $r[$i][0]; ?>"><i class="icon-edit"></i></a></td>
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
    
    
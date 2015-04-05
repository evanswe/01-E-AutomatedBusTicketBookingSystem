<style type="text/css">
	.booked{ background-color: red; }
</style>
<?php 
	$config_info = new DepartureConfig();
	$station = new Station();
	$seat_booking = new SeatBooking();
	$config_info->Id = $_GET["c_id"];
	$row = $config_info->Select();
	if(count($row)>1){
		Redirect("?p=home");
	}
	$bus_seats = new BusSeats();
	$bus_seats_rows = $bus_seats->Select($row[0]["seat"]);
	

	$current_date = date("Y-m-d");
	if($row[0]["Date"]<$current_date){
		Redirect("?p=home");
	}
?>
<div class="row" id="meee">
            <div>
               
                <div class="bg-front full-height row">
                    <div class="container rel">
                        <div class="search-tabs search-tabs-bg" style="margin-top:10px">
                        	<div class="row">
                        		<div class="col-lg-12">
                        			Total Seat: <?php echo $row[0]["seat"]; ?>|| From: <?php echo $row[0]["StationFrom"]; ?> || To: <?php echo $row[0]["StationTo"]; ?>  
                        			|| Departure Date: <?php echo $row[0]["Date"]; ?>  || Time: <?php echo $row[0]["TimeStart"]; ?>
                        			|| <span id="busFare"><?php echo $row[0]["BusFare"]; ?></span>  
                        		</div>
                        	</div>


                        	<div class="row">
                        		<div class="col-lg-12">

                        			<!--Seat Booking Section Work-->
									<div class="main-container">
									    	<div id="seat_container" class="bus-container-col-4 shadow radius padding-bottom">
									        	<div class="wheel">
									            	<img src="UiAssets/ticketbooking/icon/wheel.png" />
									            </div>
									            <div class="seat-container margin-bottom" id="bus_seats">
									            	<?php 
									            		$j=0;
										            	$k = 0;
										            	for($i=0; $i<count($bus_seats_rows); $i++){
										            		$j++;

										            		$seat_booking->DepartureConfigId = $_GET["c_id"];
										            		$seat_booking->SeatsArray = $bus_seats_rows[$i][1];
										            		$checkBooking = $seat_booking->CheckExist();

										            		//echo count($checkBooking);
										            		//if()


															if($j <= 3){
										            			if($j%3==0){
										            				if($checkBooking>0){
										            					echo '<span class="seats space booked '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}else{
										            					echo '<span class="seats space '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}
										            			}else{
										            				if($checkBooking>0){
										            					echo '<span class="seats booked '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}else{
										            					echo '<span class="seats '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}
										            			}
										            		}else{
										            			$k++;
										            			if($k%4 == 0){
										            				if($checkBooking>0){
										            					echo '<span class="seats space booked '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}else{
										            					echo '<span class="seats space '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}
										            			}else{
										            				if($checkBooking>0){
										            					echo '<span class="seats booked '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}else{
										            					echo '<span class="seats '.$bus_seats_rows[$i][1].'">'.$bus_seats_rows[$i][1].'</span>';		
										            				}
										            			}
										            		}
														}
									            	?>
									            </div>
									        </div>



									        <div class="bus-container-col-4 margin-left">
									        	<?php 
									        	$passenger = new Passenger();
									        	$seat_booking = new SeatBooking();
									        	if(isset($_POST["sub"])){
									        		$seats_array = $_POST["seats_array"];
									        		$full_name = $_POST["full_name"];
									        		$email = $_POST["email"];
									        		$mobile = $_POST["mobile"];
									        		$gender = $_POST["gender"];
									        		
									        		
									        		$passenger->Mobile = $mobile;
									        		$passenger->SelectByMobile();

									        		if($passenger->Id != ""){
								        				$seat_booking->DepartureConfigId = $_GET["c_id"];
									        			$seat_booking->SeatsArray = $seats_array;
									        			$seat_booking->PassengerId = $passenger->Id;
									        			$seat_booking->ConfirmedBy = 0;
									        			$seat_booking->ConfirmationStatus = 0;
									        			if($seat_booking->Insert()){
									        				echo "Already Registered.. Your Booking information submitted";
									        			}	
									        		}else{
									        			$passenger->Name = $full_name;
										        		$passenger->Email = $email;
										        		$passenger->SeatsArray = $seats_array;
										        		$passenger->Mobile = $mobile;
										        		$passenger->Gender = $gender;

										        		if($passenger->Insert()){
										        			$passenger->SelectByMobile($mobile);
										        			$seat_booking->DepartureConfigId = $_GET["c_id"];
										        			$seat_booking->SeatsArray = $seats_array;
										        			$seat_booking->PassengerId = $passenger->Id;
										        			$seat_booking->ConfirmedBy = 0;
										        			$seat_booking->ConfirmationStatus = 0;
										        			if($seat_booking->Insert()){
										        				echo "Your Booking information submitted";
										        			}
										        		}
									        		}
									        	}
									        	?>
									            <table class="table table-bordered" id="ticket_info">
									                <tr>
									                    <th>Seat</th>
									                    <th>Fare</th>
									                    <th>Remove</th>
									                </tr>
									            </table>
									            
									            <span class="col-lg-12">Total Fare: <span id="total_fare"></span></span>

									            <div class="col-lg-12">
													<form action="" method="post">
													  <div class="form-group">
													    <input type="text" name="seats_array" class="form-control" id="seats_array" placeholder="Enter email">
													  </div>
													  <div class="form-group">
													    <input type="text" class="form-control" name="full_name"  id="full_name" placeholder="Enter full name">
													  </div>
													  <div class="form-group">
													    <input type="text" name="email"  class="form-control" id="email" placeholder="Enter email">
													  </div>
													  <div class="form-group">
													    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
													  </div>
													  <div class="form-group">
													  	<select name="gender" class="form-control">
													  		<option>Select Gender</option>
													  		<option value="Male">Male</option>
													  		<option value="Female">Female</option>
													  	</select>
													  </div>
													  
													  <button type="submit" name="sub" class="btn btn-default">Submit</button>
													</form>
									            </div>
									        </div>

										</div>
                        		<!--End Seat Booking Section Work-->



                        		</div>
                        	</div>

                        </div>
                    </div>
                </div>
            </div>
</div>


<script>


		$(document).on("click",".seats",function(){
			var this_seat = $(this);
			var selected_seat = $(this).text();
			var fare = $("#busFare").text();
			var new_row = "<tr class='new_row'><td class='seat_taken'>"+selected_seat+"</td><td>"+fare+"</td><td><i class='fa fa-times remove'></i></td></tr>";
			var check_exist = 0;
			var count_select = 0;
			$("#ticket_info tr").each(function(index, element) {
				count_select++;
				var exist_seat = $(this).children("td").eq(0).text();
                if(selected_seat == exist_seat){
					check_exist++;
				}
            });
			if(count_select>5){
				alert("You have selected maximum seats");
				return false;
			}
			if($(this).hasClass("booked")){
				alert("The seat is already booked");
				return false;
			}
			if(check_exist > 0){
				alert("You already have selected this seat");
			}else{
				this_seat.addClass("selected_seat");
				$("#ticket_info").append(new_row);

				var total_fare = 0;
				var seats = "";
				$("#ticket_info tr").each(function(){
					if($(this).hasClass("new_row")){
						total_fare += parseInt($(this).find("td").eq(1).text());
						seats += $(this).find("td").eq(0).text()+",";
					}
				});
				$("#total_fare").text(total_fare);
				$("#seats_array").val(seats);
			}

		});
	

		$(document).on("click",".remove",function(){
			$(this).parents("tr").remove();
			var remove_selection = $(this).parents("tr").children(".seat_taken").text();
			$(".seats").each(function(index, element) {
				var seat = $(this);
				if(remove_selection == $(this).text()){
					seat.removeClass("selected_seat");
				}
            });

            var total_fare = 0;
			$("#ticket_info tr").each(function(){
					if($(this).hasClass("new_row")){
						total_fare += parseInt($(this).find("td").eq(1).text());
					}
			});
			$("#total_fare").text(total_fare);
		});



/****************************Loading************************************/
		setInterval(function(){
			$("#seat_container").load(location.href + " #seat_container");
				$("#ticket_info tr").each(function(){
					var obj = $(this);
					if($(this).hasClass("new_row")){
						var current_seat = $(this).find("td").eq(0).text();
						if($("."+current_seat).hasClass("booked")){
							var bus_fare = parseInt($("#total_fare").text()) - parseInt($("#busFare").text());
							obj.remove();
							$("#total_fare").html(bus_fare);
							var new_seats_array = $("#seats_array").val().replace(current_seat+",", "");
							$("#seats_array").val(new_seats_array);
						}
						$("."+current_seat).addClass("selected_seat");
					}
					
				});


            
			console.log("Load ++ ");
		}, 1000);

	

	</script>

<style type="text/css">
    .custom-button{
        margin-top: 21px
    }
    @media screen and (max-width: 800px){
        .custom-button{
            margin-top: 0 !important;
            margin-left: 0;
        }
    }
</style>
<script>
	$(document).ready(function(){
		//alert("Hi");
		//alert($("#meee").scrollTop());
	});
</script>
<?php 
	$station = new Station();
	$departure_config = new DepartureConfig();
	$bus = new Bus();
?>
<!-- TOP AREA -->
<div class="row" id="meee">
            <div>
               
                <div class="bg-front full-height row">
                    <div class="container rel">
                        <div class="search-tabs search-tabs-bg" style="margin-top:10px">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab"><i class="fa fa-bus"></i> <span>Bus Ticket Booking</span></a>
                                    </li>

                                    <li>
                                        <a href="#tab-2" data-toggle="tab"><i class="fa fa-plane"></i> <span>Flights</span></a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-1">
                                        <h2>Bus Ticket Booking</h2>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                
                                                
                                                

                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-lg form-group-icon-left">
                                                            <i class="fa fa-map-marker input-icon"></i>
                                                            <label>Where are you going From</label>
                                                            <select name="station_from" class="typeahead form-control">
                                                                <option>Select Station From</option>
																<?php 
																	Option($station->Select());
																?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-lg form-group-icon-left">
                                                            <i class="fa fa-map-marker input-icon"></i>
                                                            <label>Where are you going ?</label>
                                                            <select name="station_to" class="typeahead form-control">
                                                                <option>Select Station To</option>
																<?php 
																	Option($station->Select());
																?>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="input-daterange">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                        <label>Select Date</label>
                                                                        <input class="form-control" name="start" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
																		<i class="fa input-icon "></i>
                                                                        <label> </label>
																		<button class="btn btn-primary btn-lg custom-button" name="search_bus" type="submit">Search for Activities</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
												
												
                                            </div>
                                            
                                        </form>
										
                                            <div class="row">
												<div class="col-md-12" id="search_results">
													<?php 
                                                        $date = date("m/d/Y");
														if(isset($_POST["search_bus"])){
                                                            $search_date = $_POST["start"];
                                                            if($search_date<$date){
                                                                echo "Invalid date";
                                                                return false;
                                                            }
															$departure_config->StationFrom = $_POST["station_from"];
															$departure_config->StationTo = $_POST["station_to"];
															$departure_config->Date = date("Y-m-d", strtotime($_POST["start"]));
															$search_data = $departure_config->Select();
															//echo "Station From: ".."<br/>";
															//echo "Station To: ".$_POST["station_to"]."<br/>";
															//echo "Departure Date: ".$_POST["start"]."<br/>";
															if($search_data != ""){
															?>
															<table class="table table-bordered">
																<tr>
                                                                    <th>Bus Name</th>
																	<th>Coach No</th>
																	<th>Station From</th>
																	<th>Station To</th>
                                                                    <th>Bus Fare</th>
																	<th>Departure Date</th>
																	<th>Journey Type</th>
																	<th>Total Seats</th>
                                                                    <th>Booking</th>
																</tr>
																
																<?php 
																for($i=0; $i<count($search_data); $i++){
																	echo "<tr>";
																	echo "<td>".$search_data[$i]["BusName"]."</td>";
																	echo "<td>".$search_data[$i]["CoachNo"]."</td>";
																	echo "<td>".$search_data[$i]["StationFrom"]."</td>";
																	echo "<td>".$search_data[$i]["StationTo"]."</td>";
                                                                    echo "<td>".$search_data[$i]["BusFare"]."</td>";
																	echo "<td>".$search_data[$i]["Date"]."</td>";
																	echo "<td>".$search_data[$i]["JourneyType"]."</td>";
																	echo "<td>".$search_data[$i]["seat"]."</td>";
                                                                    echo "<td><a class='btn btn-sm btn-success' href='?p=seat_booking&c_id=".$search_data[$i]["id"]."'>Select</a></td>";
																	echo "</tr>";
																}
																?>
															</table>
															<?php 
                                                            }else{
                                                                echo "No search results found on : ".$_POST["start"];
                                                                echo "<br/>";
                                                            }
														}
													?>
                                                </div>                                                
                                            </div>

                                    </div>


                                    <div class="tab-pane fade" id="tab-2">
                                        <h2>Search for Cheap Flights</h2>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <i class="fa fa-map-marker input-icon"></i>
                                                        <label>Where are you going?</label>
                                                        <input class="typeahead form-control" placeholder="City, Airport, Point of Interest or U.S. Zip Code" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <i class="fa fa-map-marker input-icon"></i>
                                                        <label>Where are you going?</label>
                                                        <input class="typeahead form-control" placeholder="City, Airport, Point of Interest or U.S. Zip Code" type="text" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-daterange">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                    <label>From</label>
                                                                    <input class="form-control" name="start" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                    <label>To</label>
                                                                    <input class="form-control" name="end" type="text" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg" type="submit">Search for Activities</button>
                                        </form>
                                    </div>



                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP AREA  -->

		


		
		
		
        <div class="gap"></div>






        <div class="container">
            
            
            <div class="text-center row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row row-wrap" data-gutter="60">
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <i class="fa fa-dollar box-icon-gray box-icon-center round box-icon-border box-icon-big animate-icon-top-to-bottom"></i>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Price Guarantee</a></h5>
                                    <p class="thumb-desc">Facilisis sollicitudin dolor dignissim pulvinar ultrices nullam vel ultricies phasellus</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <i class="fa fa-lock box-icon-gray box-icon-center round box-icon-border box-icon-big animate-icon-top-to-bottom"></i>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Trust & Safety</a></h5>
                                    <p class="thumb-desc">Risus porttitor dignissim nibh purus ornare imperdiet nullam convallis mattis</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <i class="fa fa-send box-icon-gray box-icon-center round box-icon-border box-icon-big animate-icon-top-to-bottom"></i>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Destinations</a></h5>
                                    <p class="thumb-desc">Sollicitudin enim ad mauris lacus lectus a iaculis lorem pellentesque</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>
        
		
		
		
		







<div class="container">
            <div class="gap"></div>
            <h2 class="text-center">Top Destinations</h2>
            <div class="gap">
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="UiAssets/img/800x600.png" alt="Image Alternative text" title="Upper Lake in New York Central Park" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">USA</h4>
                                <p class="thumb-desc">Tellus cum ante sed mus vulputate scelerisque eu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="UiAssets/img/800x600.png" alt="Image Alternative text" title="lack of blue depresses me" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Greece</h4>
                                <p class="thumb-desc">Per fermentum etiam nisi platea dui posuere nibh</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="UiAssets/img/800x600.png" alt="Image Alternative text" title="people on the beach" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Australia</h4>
                                <p class="thumb-desc">Netus eros sed nisl senectus natoque sapien maecenas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="UiAssets/img/400x300.png" alt="Image Alternative text" title="the journey home" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Africa</h4>
                                <p class="thumb-desc">Himenaeos proin in natoque porta sociis semper posuere</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>		
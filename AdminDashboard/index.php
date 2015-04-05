<?php include_once("controller/config.php"); ?>

<?php 
	if(!isset($_SESSION["LoginId"])){
		Redirect("login.php");
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="../DashboardAssets/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/custom-plugins/picklist/picklist.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/plugins/select2/select2.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/plugins/ibutton/jquery.ibutton.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/plugins/cleditor/jquery.cleditor.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="../DashboardAssets/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="../DashboardAssets/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="../DashboardAssets/custom.me/custom.me.css" media="screen">


<!--Date picker style
<link rel="stylesheet" type="text/css" href="../DashboardAssets/date-picker/jquery-ui.css" media="screen">-->
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" media="screen">
<!--End Date picker style-->

<script type="text/javascript" src="../jquery.js"></script>

<!--date picker jquery-ui-->
<script type="text/javascript" src="../DashboardAssets/date-picker/jquery-ui.js"></script>
<!--End datepicker-->


<title>MWS Admin - Form Elements</title>


<style>
	input[type="text"]{
		height: 32px;
		border-color: #cccccc;
	}
	
	input[type="text"]:focus{
		border-color: #66afe9;
	}
	
	.mws-form-label{
		font-size:16px; font-weight:bold; color:#333333; font-family:Arial, Helvetica, sans-serif; text-align:right;
	}
	
	.mws-panel .mws-panel-header{
			background-color: #f3f3f3; background-image: none; border-bottom:0px; border: 1px #d4d4d4 solid;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
background-image: linear-gradient(to bottom, #ffffff 0%, #f2f2f2 100%);
background-repeat: repeat-x;
			font-size: 14px; color: #333;
	}
	
	.mws-panel .mws-panel-header span{
		font-size: 18px; font-weight:bold; color: #333;
	}
	
	.first-element{
		margin-top: 8px;
	}
</style>


</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="../DashboardAssets/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="../DashboardAssets/example/Eaj14.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                    Md.Farhad Evan
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="?a=userEdit.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                   <li><a href="?a=addUser"><i class="icon-home"></i>Add User </a></li>
                    <li><a href="?a=busAdd"><i class="icon-home"></i>Bus Add</a></li>
                   
                    <li><a href="?a=counterAdd"><i class="icon-home"></i>Counetr Add</a></li>
                    <li><a href="?a=assignCounterPerson"><i class="icon-home"></i>Counter Person</a></li>
                    <li><a href="?a=stationAdd"><i class="icon-home"></i>Station Add</a></li>
                    <li><a href="?a=departureconfigAdd"><i class="icon-home"></i>Departure Config</a></li>
                    <li><a href="?a=busseatsAdd"><i class="icon-home"></i>Bus Seats Add</a></li>
                    <li><a href="?a=passengerAdd"><i class="icon-home"></i>Passenger Add</a></li>
                     <li><a href="?a=assignseatsAdd"><i class="icon-home"></i> Assign Seats</a></li>
                    

                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
				<?php 
					include_once("controller/controlPages.php");
				?>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Farhad Evan
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="../DashboardAssets/js/libs/jquery-1.8.3.min.js"></script>
    <script src="../DashboardAssets/js/libs/jquery.mousewheel.min.js"></script>
    <script src="../DashboardAssets/js/libs/jquery.placeholder.min.js"></script>
    <script src="../DashboardAssets/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="../DashboardAssets/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="../DashboardAssets/jui/jquery-ui.custom.min.js"></script>
    <script src="../DashboardAssets/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="../DashboardAssets/jui/js/globalize/globalize.js"></script>
    <script src="../DashboardAssets/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="../DashboardAssets/custom-plugins/picklist/picklist.min.js"></script>
    <script src="../DashboardAssets/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="../DashboardAssets/plugins/select2/select2.min.js"></script>
    <script src="../DashboardAssets/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="../DashboardAssets/plugins/validate/jquery.validate-min.js"></script>
    <script src="../DashboardAssets/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="../DashboardAssets/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="../DashboardAssets/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="../DashboardAssets/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="../DashboardAssets/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="../DashboardAssets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../DashboardAssets/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="../DashboardAssets/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="../DashboardAssets/js/demo/demo.formelements.js"></script>
    
    
    

</body>
</html>

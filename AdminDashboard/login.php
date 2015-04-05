<?php include_once("controller/config.php"); ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='3913bb86301e8d3ad3eafbc7832aaa8e.css'>

  <link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

  <link href="assets/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title>Admin | Login</title>

</head>

<body>
 

<div class="all-wrapper no-menu-wrapper">
  <div class="login-logo-w">
    <a href="#" class="logo">
      <img src="img/security.png" width="100" height="100" />
      <span>Admin Authentication</span>
    </a>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
	
	<?php 
	$msg = "";
		if(isset($_POST["login"])){
			$user = new User();
			
			$user->Email = $_POST["email"];
			$user->Password = $_POST["password"];
			if($user->Login()){
				$_SESSION["LoginId"] = $user->Id;
				Redirect("../AdminDashboard");
			}else{
				$msg = " &nbsp;&nbsp;&nbsp;Login Error";
			}
		}
	?>
	
	<form action="" method="post">
		  <div class="content-wrapper bold-shadow">
			<div class="content-inner">
			  <div class="main-content main-content-grey-gradient no-page-header">
				<div class="main-content-inner">
				  <p style="color:red"><?php echo $msg; ?></p>
				  <h3 class="form-title form-title-first"><img src="img/key.png" width="44" height="44" style="margin-top: -6px" /> Login Example</h3>
				  
				  <div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Enter your email" />
				  </div>
				  <div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Enter your password" />
				  </div>
				  
				  <input type="submit" name="login" value="SIGN IN" class="btn btn-primary btn-lg"/>
				  <a href="Login.aspx" class="btn btn-link">Cancel</a>
				</div>
			  </div>
			</div>
		</form>
      
	  
	  </div>
    </div>
  </div>
</div>

<div class="color_settings_box hidden-xs">
  <h3>Color Settings</h3>
  <label for="wood-wrapper-checkbox" class="checkbox-w">
    <input type="checkbox" id="wood-wrapper-checkbox">
    <span class="wood-checkbox"></span> Panel 
  </label>
  <h3>Background</h3>
  <div class="color-settings-w" data-replace-element="body" data-leave-class="">
    <div class="color-box color-box-dark-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="Solid Dark Blue" data-replace-with="body-dark-blue"></div>
    <div class="color-box color-box-light-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="Solid Light Blue" data-replace-with="body-blue"></div>
    <div class="color-box color-box-grey color-tooltip" data-toggle="tooltip" data-placement="top" title="Solid Grey" data-replace-with="body-grey"></div>
    <div class="color-box color-box-linen-dark color-tooltip active" data-toggle="tooltip" data-placement="top" title="Dark Linen" data-replace-with="body-dark-linen"></div>
    <div class="color-box color-box-linen-light color-tooltip" data-toggle="tooltip" data-placement="top" title="Light Linen" data-replace-with="body-light-linen"></div>
  </div>
  <h3>Header</h3>
  <div class="color-settings-w" data-replace-element=".page-header" data-leave-class="page-header">
    <div class="color-box color-box-dark-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="Dark Blue" data-replace-with="page-header-dark-blue"></div>
    <div class="color-box color-box-red active color-tooltip" data-toggle="tooltip" data-placement="top" title="Red" data-replace-with="page-header-red"></div>
    <div class="color-box color-box-green color-tooltip" data-toggle="tooltip" data-placement="top" title="Green" data-replace-with="page-header-green"></div>
    <div class="color-box color-box-green-sea color-tooltip" data-toggle="tooltip" data-placement="top" title="Green Sea" data-replace-with="page-header-green-sea"></div>
    <div class="color-box color-box-orange color-tooltip" data-toggle="tooltip" data-placement="top" title="Emerald" data-replace-with="page-header-orange"></div>
    <div class="color-box color-box-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="Blue" data-replace-with="page-header-blue"></div>
  </div>
  <h3>Active Menu</h3>
  <div class="color-settings-w" data-replace-element=".side-menu" data-leave-class="side-menu">
    <div class="color-box color-box-dark-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="Dark Blue" data-replace-with="side-menu-dark-blue"></div>
    <div class="color-box color-box-red active color-tooltip" data-toggle="tooltip" data-placement="top" title="Red (Default)" data-replace-with="side-menu-red"></div>
    <div class="color-box color-box-green color-tooltip" data-toggle="tooltip" data-placement="top" title="Green" data-replace-with="side-menu-green"></div>
    <div class="color-box color-box-green-sea color-tooltip" data-toggle="tooltip" data-placement="top" title="Green Sea" data-replace-with="side-menu-green-sea"></div>
    <div class="color-box color-box-orange color-tooltip" data-toggle="tooltip" data-placement="top" title="Orange" data-replace-with="side-menu-orange"></div>
    <div class="color-box color-box-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="Blue" data-replace-with="side-menu-blue"></div>
  </div>
  <h3>Content</h3>
  <div class="color-settings-w" data-replace-element=".content-inner" data-leave-class="content-inner">
    <div class="color-box color-box-white color-tooltip" data-toggle="tooltip" data-placement="top" title="White" data-replace-with="content-inner-white"></div>
    <div class="color-box color-box-grey color-tooltip" data-toggle="tooltip" data-placement="top" title="Grey" data-replace-with="content-inner-grey"></div>
    <div class="color-box color-box-beige active color-tooltip" data-toggle="tooltip" data-placement="top" title="Beige" data-replace-with="content-inner-beige"></div>
  </div>
  <div class="toggle-color-settings">
    <i class="icon-cog"></i>
    <span>hide</span>
  </div>
</div>


<script src="jsLogin/jquery.min.js"></script>
<script src="jsLogin/jquery-ui.min.js"></script>
<script src='865b8229b0ce41d6b0c8e0fc7416f9f2.js'></script>

</body>


<!-- Mirrored from mars.pinsupreme.com/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 08 May 2014 10:12:00 GMT -->
</html>

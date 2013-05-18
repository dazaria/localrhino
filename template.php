<?php
	session_start();
	$appName = "Local Rhino";
	
	$homeURL = '.';
	$addPropertyURL = "addProperty.php";
	$applicantsURL = "applicants.php";
	$applicationURL = "application.php";
	$propertiesURL = "properties.php";
	$loginHandlerURL = "loginHandler.php";
	
?>
<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
  		<title>
  			<?php
  				echo $appName . ' - ' . $pageTitle;
  			?>
  		</title>
  		
	<!-- Le styles -->
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<!--<link href="css/jquery.css" rel="stylesheet" type="text/css" media="all" />-->
		<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="favicon.ico">
		<!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="js/add2home.js?k=0"></script>		
		<script src="js/default.js"></script>	
		<script src="js/parsley.js"></script>	
		<?php
			echo $head;
		?>
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href=".">
						<span class="homeIcon">Local Rhino</span>
					</a>
					<div class="nav-collapse">
						<ul class="nav">
							<?php
								echo"<li class='{$homeTab}'><a href='{$homeURL}'>Home</a></li>";
								echo"<li class='{$landlordsTab}'><a href='{$addPropertyURL}'>Add a Property</a></li>";
								echo"<li class='{$propertiesTab}'><a href='{$propertiesURL}'>View Properties</a></li>";
								echo"<li class='{$rentersTab}'><a href='{$applicationURL}'>Apply</a></li>";	
								if($_SESSION['isLoggedIn'] == true){
									echo"<li><a href='{$loginHandlerURL}?logout=true'>Sign Out</a></li>";	
								}else{
									echo"<li><a href='javascript:void(0);' onclick='regPop(\"login\");'>Log In</a></li>";	
								}
							?>							
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	
		<div class="container">
	
		  <!-- Main hero unit for a primary marketing message or call to action -->
		  <div <?php if($isHero === true){ echo'class="hero-unit"'; } ?> >
		  	<?php
		  		echo $mainContent;
		  	?>
		  </div>
	
		<?php
			if($content1 != null){
		?>
		  <!-- Example row of columns -->
		  <div class="row">
			<div class="span4">
			 	<?php echo $content1; ?>
			</div>
			<div class="span4">
			 	<?php echo $content2; ?>
		   </div>
			<div class="span4">
				<?php echo $content3; ?>
			</div>
		  </div>
		<?php
			}
		?>
	
	
		  <hr>
	
		  <footer>
			<p>
				<?php echo"Copyright &copy; " . date('Y') . ", " . $appName . " | <a href='#'>Privacy Policy</a> | <a href='#'>Terms & Conditions</a>"; ?>
			</p>
		  </footer>
	
		</div> <!-- /container -->

		<div id="regPop" class="popup">
			<span class="bClose"><span>X</span></span>	
				<span id="regPopupForm">
					<h2>Sign Up</h2>
					<div class="pForm">
						<form name='register' action='loginHandler.php' method='post' validate='validate' novalidate>
							<input type="hidden" name="isRegister" value="true" />
							<label for='r_email'>Email: </label>
							<input type='email' placeholder='example@something.com' name='email' id='r_email' required='required'/>
							<div id="r_email_msg" class="inputMessage"></div>
							<label for='r_password'>Password: </label>
							<input type='password' placeholder='*******' name='password' id='r_password' required='required' validate='strength' minlength='6'/>
							<div id="r_password_msg" class="inputMessage"></div>
							<label for='r_password2'>Re-enter Password: </label>
							<input type='password' placeholder='*******' name='password2' id='r_password2' required='required' match="r_password" />
							<div id="r_password2_msg"  class="inputMessage"></div>
							<p>
								<input class='btn btn-primary' type="submit" value="Sign Up &raquo;" /> or <a href='javascript:void(0);' onclick='regToLog()'>Login</a>
							</p>
						</form>
					</div>
				</span>
				<span id="logPopupForm" style="display:none;">
					<h2>Login</h2>
					<div class="pForm">
						<form name='login' action='loginHandler.php' method='post' validate='validate' novalidate>
							<label for='email'>Email: </label>
							<input type='email' placeholder='example@something.com' name='email' id='email' required='required'/>
							<label for='password'>Password: </label>
							<input type='password' placeholder='*******' name='password' id='password' required='required'/>
							<p>
								<input class='btn btn-primary' type="submit" value="Login &raquo;" /> or <a href='javascript:void(0);' onclick='logToReg()'>Sign Up</a>
							</p>
						</form>
					</div>
				</span>
			</div>
		</div>

		<script src="js/bootstrap.min.js"></script>

		<?php
			echo $foot;
		?>		
	</body>
</html>
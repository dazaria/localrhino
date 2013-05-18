<?php
	session_start();
	$pageTitle = "Home";
	$homeTab = 'active';
	$isHero = true;
	
	/*----content section-----*/
	if($_SESSION['isLoggedIn'] == true){
		$signupText = "";
	}else{
		$signupText = "What are you waiting for? <a href='javascript:regPop();'>Sign up</a> for your <strong>free</strong> account today!";
	}
	$mainContent =  "
		<div class='apartment'>
			<h1>Local Rhino</h1>
			<br/>
			<p>
				Are you still using pen and paper for your rental applications?<br/>Local Rhino is the easiest and fastest way for landlords and property managers to find the best prospective tenants. From the initial listing all the way through the application process, Local Rhino gives landlords the tools to accept applications online, quickly review applicants, check credit history and process applications. Renters also benefit by doing away with the hassle of filling out multiple forms by using Local Rhino's simple and easy online application to apply to units from their computers or even their phones!<br/>
			 	{$signupText} 
			 </p>
			 <br/>
			<p><a href='addProperty.php' class='btn btn-primary btn-large'>Get Started &raquo;</a></p>
		</div>
	";
	
    $content1 = "
    	<h2>Landlords</h2>
    	<div class='spacer'>
			<p>Enter the property address to create a rental application:</p>
			<form method='get' action='addProperty.php' name='landlordForm'>
				<p><input name='address' id='address' type='text' placeholder='111 Main St.' /></p>
			</form>
			<p><a class='btn' href='javascript:document.landlordForm.submit()'>Get Started &raquo;</a></p>
		</div>
	";
	
    $content2 = "	
		<h2>Renters</h2>
		<div class='spacer'>
			<p>Fill out our common application and never waste your time copying the same information in form after form.</p>
			<p><a class='btn' href='application.php'>Get Started &raquo;</a></p>
		</div>
	";
	
	if($_SESSION['isLoggedIn'] == true){
		$content3 = "
			<h2>View Your Properties</h2>
			<div class='spacer'>
				<p>View all of your properties and applicants at just a glance, and never go digging through stack of paper again!</p>
				<p><a class='btn' href='properties.php'>Get Started &raquo;</a></p>
			</div>
	";
	}
	else{
		$content3 = "	
			<h2>Login</h2>
			<div class='spacer'>
				<form name='login' action='loginHandler.php' method='post'>
					<label for='email'>Email: </label>
					<input type='email' placeholder='example@something.com' name='email' id='email1' required='required'/>
					<label for='password'>Password: </label>
					<input type='password' placeholder='*******' name='password' id='password1' required='required'/>
					<p><input class='btn' type='submit' value='Login &raquo;' /> or <a href='javascript:regPop()'>Sign Up</a></p>
				</form>
			</div>
		";
	}
	
	require 'template.php';

?>
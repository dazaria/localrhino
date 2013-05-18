<?php
	require 'applicationForm.php';

	$pageTitle = "Application";
	$rentersTab = 'active';
	
	/*----content section-----*/
	$mainContent =  "
		<h2>Local Rhino Rental Application</h2>
		<br />
		<p class='grayContainer'>
			Fill out our common application and never waste your time copying the same information in form after form.
		</p>
		
		
		
		" . $applicationForm;
	
	require 'template.php';

?>
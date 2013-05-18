<?php
	session_start();
	$address = $_GET['address'];
	$head = "
	
	<script src='https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places' type='text/javascript'></script>

    <script type='text/javascript'>
      $(document).ready(function() {
		  initializeMap();
		});
		window.onresize = function(event) {
		  initializeMap();
		}
    </script>
    ";
    
	$pageTitle = "Register";
	$landlordsTab = 'active';
	
	/*----content section-----*/
	$mainContent =  "
		<h1>Enter Property Information</h1>
		<br />
		<div>
			<form method='post' action='#' name='propertyForm'>
				<div class='grayContainer'>
					<label for='searchTextField'>Address:</label>
					<input id='searchTextField' name='searchTextField' type='text' placeholder='e.g. 111 Main St.' value='".$address."' autofocus='autofocus' />
					<label for='propertyType'>Property Type:</label>
					<select name='propertyType' id='propertyType'>
						<option value='Apartment'>Apartment</option>
						<option value='Single-family Home'>Single-family Home</option>
						<option value='Townhouse'>Townhouse</option>
						<option value='Condo'>Condo</option>
						<option value='Loft'>Loft</option>
						<!--<option value='More...'>More...</option>-->
					</select>
					<label for='state2'>Number of Units in Building:</label>
					<input name='state2' id='state2' type='number' placeholder='e.g. 10' />
				</div>
				<div id='map_canvas' class='googleMap'></div>
				<div style='display:block;'>
					<label for='bedrooms'>Number of Bedrooms:</label>
					<input name='bedrooms' id='bedrooms' type='number' placeholder='e.g. 2' />
					<label for='bathrooms'>Number of Bathrooms:</label>
					<input name='bathrooms' id='bathrooms' type='number' placeholder='e.g. 1' />
					<label for='rent'>Monthly Rent:</label>
					$ <input name='rent' id='rent' type='number' placeholder='e.g. 1000' />
					<label for='squareFeet'>Square Feet:</label>
					<input name='squareFeet' id='squareFeet' type='number' placeholder='e.g. 800' /> ft<sup>2</sup>
					<label>Pets Allowed:</label>
					<p class='petTypes'>
						<input type='checkbox' name='petsAllowed' value='small_dogs' id='petsAllowedSmallDogs' class='pets_allowed_checkbox'>
						<label for='petsAllowedSmallDogs'>Small dogs</label>
						&nbsp;
						<input type='checkbox' name='petsAllowed' value='large_dogs' id='petsAllowedLargeDogs' class='pets_allowed_checkbox'>
						<label for='petsAllowedLargeDogs'>Large dogs</label>
						&nbsp;
						<input type='checkbox' name='petsAllowed' value='cats' id='petsAllowedCats' class='pets_allowed_checkbox'>
						<label for='petsAllowedCats'>Cats</label>
					</p>
					<hr />
					<p class='grayContainer'>
						Enter a valid email address and password to register and save your application, or <a href='#'>Login</a> to save this property to your account.
					</p>
					<label for='email'>Email: </label>
					<input type='email' placeholder='example@something.com' name='email' id='email'/>
					<label for='password'>Password: </label>
					<input type='password' placeholder='*******' name='password' id='password'/>
					<label for='password2'>Re-enter Password: </label>
					<input type='password' placeholder='*******' name='password2' id='password2'/>
					<p>
						<a class='btn btn-primary' href='#'>Register and Save &raquo;</a> or <a href='applicants.php'>Login</a>
					</p>
				</div>
			</form>	
		</div>

				


	";
	
	require 'template.php';

?>
<?php
	$head = "
		<script type='text/javascript'>
		  $(document).ready(function() {
			  document.rentalApp.firstName.focus();
			});
		</script>
    ";
	$stateOptions ="<option value='AK'>Alaska</option>
					<option value='AL'>Alabama</option>
					<option value='AR'>Arkansas</option>
					<option value='AZ'>Arizona</option>
					<option value='CA'>California</option>
					<option value='CO'>Colorado</option>
					<option value='CT'>Connecticut</option>
					<option value='DC'>District Of Columbia</option>
					<option value='DE'>Delaware</option>
					<option value='FL'>Florida</option>
					<option value='GA'>Georgia</option>
					<option value='HI'>Hawaii</option>
					<option value='ID'>Idaho</option>
					<option value='IL'>Illinois</option>
					<option value='IN'>Indiana</option>
					<option value='IA'>Iowa</option>
					<option value='KS'>Kansas</option>
					<option value='KY'>Kentucky</option>
					<option value='LA'>Louisiana</option>
					<option value='MA'>Massachusetts</option>
					<option value='MD'>Maryland</option>
					<option value='ME'>Maine</option>
					<option value='MI'>Michigan</option>
					<option value='MN'>Minnesota</option>
					<option value='MO'>Missouri</option>
					<option value='MS'>Mississippi</option>
					<option value='MT'>Montana</option>
					<option value='NE'>Nebraska</option>
					<option value='NH'>New Hampshire</option>
					<option value='NJ'>New Jersey</option>
					<option value='NM'>New Mexico</option>
					<option value='NV'>Nevada</option>
					<option value='NY'>New York</option>
					<option value='NC'>North Carolina</option>
					<option value='ND'>North Dakota</option>
					<option value='OH'>Ohio</option>
					<option value='OK'>Oklahoma</option>
					<option value='OR'>Oregon</option>
					<option value='PA'>Pennsylvania</option>
					<option value='RI'>Rhode Island</option>
					<option value='SC'>South Carolina</option>
					<option value='SD'>South Dakota</option>
					<option value='TN'>Tennessee</option>
					<option value='TX'>Texas</option>
					<option value='UT'>Utah</option>
					<option value='VA'>Virginia</option>
					<option value='VT'>Vermont</option>
					<option value='WA'>Washington</option>
					<option value='WI'>Wisconsin</option>
					<option value='WV'>West Virginia</option>
					<option value='WY'>Wyoming</option>";
						
	$applicationForm =  "
		<div id='tabs'>
		   <ul class='applicationSteps'>
		      <li><label>Steps: </label></li>
			  <li><a href='#tabs-1' id='tab1'>1</a></li>
			  <li><a href='#tabs-2' id='tab2'>2</a></li>
			  <li><a href='#tabs-3' id='tab3'>3</a></li>
		   </ul>
		   <div id='tabs-1' class='tabContent'>
		   		<form method='get' name='rentalApp' validate='validate' novalidate>
					<label for='firstName'>First Name: </label>
					<input required='required' name='firstName' id='firstName' type='text' maxlength='20' value='' placeholder='First Name'>
	
					<label for='middleName'>Middle Name: </label>
					<input name='middleName' id='middleName' type='text' maxlength='20' value=''>
	
					<label for='lastName'>Last Name: </label>
					<input  required='required' name='lastName' id='lastName' type='text' maxlength='30' value=''>
	
					<label for='address'>Current Address:</label>
					<input  required='required' name='address' id='address' type='text' maxlength='45' value=''>
		
					<label for='license'>Driver's license or Govt. ID #:</label> 
					<input required='required' name='license' id='license' type='text' size='22' maxlength='20' value=''>
	
					<label for='state'>State:</label> 
					<select required='required' name='state' id='state'>
						<option value='-1'>Select One</option>
						{$stateOptions}
					</select>
					
					<label>Former last names (maiden and married): </label> 
					<input type='text' name='APPLICANT_FORMER_NAME' size='22' maxlength='20' value=''>
	
					<label>Social Security #:</label> 
					<input type='text' name='APPLICANT_SSN' size='13' maxlength='11' value='' />
	
					<label>Birthdate:</label> 
					<input class='date' type='text' name='APPLICANT_BIRTH_DATE' />
					
					<label>Gender:</label>
					<span class='radioAndLabel'>
						<input type='radio' name='gender' id='genderMale' value='M'>
						<label for='genderMale'>Male</span>
					</span>
					<span class='radioAndLabel'>
						<input type='radio' name='gender' id='genderFemale' value='F'>
						<label for='genderFemale'>Female</span> 
					</span>
	
					<label for='maritalStatus'>Marital status:</label>
					<select required='required' name='maritalStatus' id='maritalStatus'>
						<option value='-1'>Select One</option>
						<option value='SINGLE'>Single</option>
						<option value='MARRIED'>Married</option>
						<option value='DIVORCED'>Divorced</option>
						<option value='WIDOWED'>Widowed</option>
						<option value='SEPARATED'>Separated</option>
					</select>
	
					<label>Are you a U.S. citizen?:</label>
					<span class='radioAndLabel'>
						<input type='radio' name='usCitizen' id='usCitizenY' value='Y'>
						<label for='usCitizenY'>Yes</label>
					</span>
					<span class='radioAndLabel'>
						<input type='radio' name='usCitizen' id='usCitizenN' value='N'>
						<label for='usCitizenN'>No</label> 
					</span>
					<div class='formLine'>
						<input type='submit' class='btn btn-primary'  value='Next &raquo;' />
						<!--onsubmit='$(\"#tab2\").click();'-->
					</div>
				</form>
			</div>
				
				
		   <div id='tabs-2' class='tabContent'>
				<label>Do you or any occupant smoke?</label>
					<span class='radioAndLabel'>
						<input type='radio' name='smoke' id='smokeY' value='Y' />
						<label for='smokeY'>Yes</label> 
					</span>
					<span class='radioAndLabel'>
						<input type='radio' name='smoke' id='smokeN' value='N' />
						<label for='smokeN'>No</label>
					</span>
				<label>Will you or any occupant have an animal?</label>
					<span class='radioAndLabel'>
						<input type='radio' name='pets' id='petsY' value='Y' onclick='$(\"#petType\").show();document.rentalApp.petType.focus();'/>
						<label for='petsY'>Yes</label>
					</span>
					<span class='radioAndLabel'>
						<input type='radio' name='pets' id='petsN' value='N' onclick='$(\"#petType\").hide();'/>
						<label for='petsN'>No</label>
					</span>
				<span id='petType' style='display:none'> 
					<label>Kind, weight, breed, age:</label> 
					<input type='text' name='petType' size='32' maxlength='30' value=''>
				</span>				
				<label>Current home address:</label> 
				<input type='text' name='CURRENT_ADDRESS' size='32' maxlength='30' value=''>
				<label>City:</label> 
				<input type='text' name='CURRENT_CITY' size='32' maxlength='30' value=''>
				<label>State:</label> 
				<select name='CURRENT_ST'>
					<option value=''>Select One</option>
					{$stateOptions}
				</select>
				<label>Zip:</label> 
				<input type='text' name='CURRENT_ZIP' size='12' maxlength='10' vcard_name='vCard.Home.Zipcode' value='' />						
				<label>Primary Phone Number:</label> 
				<input type='text' name='CURRENT_PHONE' size='16' maxlength='14' vcard_name='vCard.Home.Phone' value=''>	
				<label>Email address:</label> 
				<input type='text' name='CURRENT_EMAIL' size='52' maxlength='50' vcard_name='vCard.Email' value='' />
				<label>Do you rent your current residence?</label> 
				<span class='radioAndLabel'>
					<input type='radio' name='currentlyRent' id='currentlyRentY' value='Y' onclick='$(\"#currentlyRentDetails\").show();document.rentalApp.currentApt.focus();'>
					<label for='currentlyRentY'>Yes</label>
				</span>
				<span class='radioAndLabel'>
					<input type='radio' name='currentlyRent' id='currentlyRentN' value='N' onclick='$(\"#currentlyRentDetails\").hide();'>
					<label for='currentlyRentN'>No</label>
				</span>
				<span id='currentlyRentDetails' style='display:none;'>
					<label>Apartment Name:</label> 
					<input type='text' name='currentApt' size='32' maxlength='30' value='' />
					<label>Name of Landlord or Property Manager:</label> 
					<input type='text' name='CURRENT_OWNER_MANAGER' size='32' maxlength='30' value='' />
					<label>Phone Number for Landlord or Property Manager:</label> 
					<input type='text' name='CURRENT_OWNER_PHONE' size='16' maxlength='14' value='' />
					<label>Current monthly rent:</label> $ 
					<input type='text' name='CURRENT_RENT' size='10' value='' />				
					<label>Date moved in:</label> 
					<input type='text' name='CURRENT_DATE_MOVED_IN' size='12' maxlength='10' value='' />
					<label>Reason for leaving your current residence?</label>
					<textarea cols='40' rows='3' wrap='virtual' name='CURRENT_REASON_FOR_LEAVING'>
					</textarea>
				</span>
				<div class='formLine'>
					<input type='button' class='btn'  value='&laquo; Back' onclick='$(\"#tab1\").click();' />
					<input type='submit' class='btn btn-primary'  value='Next &raquo;' onclick='$(\"#tab3\").click();'  />
				</div>
			</div>
			
			
		   <div id='tabs-3' class='tabContent'>
			  <div class='formLine'>
				<label>Previous Address:</label> 
				<input type='text' name='PREVIOUS_ADDRESS' size='32' maxlength='30' value=''>
				<div class='formLine'>
					<label>City:</label> 
					<div class='formLine'>
						<input type='text' name='PREVIOUS_CITY' size='32' maxlength='30' value=''>
						<label>State:</label> 
						<select name='PREVIOUS_ST'>
							<option value=''>Select One</option>
							{$stateOptions}
						</select>
					</div>
				</div>
				<label for='previousZip'>Zip:</label> 
				<input type='text' id='previousZip' name='previousZip' maxlength='10' value='' />
				<label>Did you rent your previous residence?</label>
				<span class='radioAndLabel'>
					<input type='radio' name='rentedPreviousResidence' id='rentedPreviousResidenceY' value='Y' onclick='$(\"#previousResidenceDetails\").show();document.rentalApp.previousApt.focus();'>
					<label for='rentedPreviousResidenceY'>Yes</label> 
				</span>
				<span class='radioAndLabel'>
					<input type='radio' name='rentedPreviousResidence' id='rentedPreviousResidenceN' value='N' onclick='$(\"#previousResidenceDetails\").hide();'>
					<label for='rentedPreviousResidenceN'>No</label> 
				</span>
				<span id='previousResidenceDetails' style='display:none;'>
					<label>Apartment name:</label> 
					<input type='text' name='previousApt' size='32' maxlength='30' value='' />
					<label>Name of above owner or manager:</label> 
					<input type='text' name='PREVIOUS_OWNER_MANAGER' size='32' maxlength='30' value='' />
					<label>Their phone:</label> 
					<input type='text' name='PREVIOUS_OWNER_PHONE' size='16' maxlength='14' value='' />
					<label>Previous monthly rent:</label>
					<input type='text' name='PREVIOUS_RENT' size='10' value='$' />
					<label>Date you moved in:</label> 
					<input type='text' name='PREVIOUS_DATE_MOVED_IN' size='12' maxlength='10' value='' />
					<label>Date you moved out:</label> 
					<input type='text' name='PREVIOUS_DATE_MOVED_OUT' size='12' maxlength='10' value=''>
				</span>
				<div class='formLine'>
					<input type='button' class='btn'  value='&laquo; Previous' onclick='$(\"#tab2\").click();' />
					<input type='submit' class='btn btn-primary'  value='Submit &raquo;'/>
				</div>
		   </div>
		</div>		
			
		</form>
		<script>
			$(document).ready(function() {
				$( '#tabs' ).tabs();
			});
		</script>
	";
?>
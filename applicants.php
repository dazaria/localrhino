<?php
	session_start();
	$address = $_GET['address'];	
	$pageTitle = "Applicants";
	$propertiesTab = 'active';

	
	/*----content section-----*/
	$mainContent =  "
		<h2><a href='properties.php'>Properties</a> &raquo; " . $address . "</h2>
		<br/>
		<div id='table_div'></div>
		<br/>
		
		<script type='text/javascript' src='https://www.google.com/jsapi'></script>
		<script type='text/javascript'>
			google.load('visualization', '1', {packages:['table']});
			google.setOnLoadCallback(drawTable);
			function drawTable() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Full Name');
				data.addColumn('number', 'Annual Income');
				data.addColumn('number', 'Credit Score');
				data.addColumn('string', 'Occupation');
				data.addColumn('string', 'Gender');
				data.addColumn('number', 'No. Occupants');
				
				data.addRows(5);
				
				data.setCell(0, 0, 'Derek Rose');
				data.setCell(0, 1, 180000, '$180,000');
				data.setCell(0, 2, 680);
				data.setCell(0, 3, 'Point Guard');
				data.setCell(0, 4, 'M');
				data.setCell(0, 5, 1);
				
				data.setCell(1, 0, 'Jane Gross');
				data.setCell(1, 1, 88000, '$88,000');
				data.setCell(1, 2, 560);
				data.setCell(1, 3, 'Firefighter');
				data.setCell(1, 4, 'F');
				data.setCell(1, 5, 1);
				
				data.setCell(2, 0, 'Greg Jackson');
				data.setCell(2, 1, 120500, '$120,500');
				data.setCell(2, 2, 760);
				data.setCell(2, 3, 'Lawyer');
				data.setCell(2, 4, 'M');
				data.setCell(2, 5, 2);
				
				data.setCell(3, 0, 'Penelope Francis');
				data.setCell(3, 1, 75000, '$75,000');
				data.setCell(3, 2, 500);
				data.setCell(3, 3, 'Consultant');
				data.setCell(3, 4, 'F');
				data.setCell(3, 5, 4);
				
				data.setCell(4, 0, '<a href=\'javascript:void(0);\' onclick=\'showApp(1);\'>David Azaria</a>');
				data.setCell(4, 1, 585000, '$585,000');
				data.setCell(4, 2, 450);
				data.setCell(4, 3, 'Engineer/Jedi Knight');
				data.setCell(4, 4, 'M');
				data.setCell(4, 5, 3);
				
				var table = new google.visualization.Table(document.getElementById('table_div'));
				table.draw(data, {showRowNumber: false, sortColumn:0, allowHtml:true});

			}
			
			function showApp(uid){
				$.getJSON('api/getApplicationDetails/?uid=1', function(result) {
					$('#app').bPopup({
						follow: [true, false],
						positionStyle: 'fixed'
					});
					var dispVal;
					$.each(result, function(key, val) {
						$.each(result[key], function(key2, val2) {
							if(val){
								if(key2 != 'appID' && key2 != 'uid' && key2 != 'propertyID'){
									if(key2 == 'email' || key2 == 'previous_address_landlordEmail'){
										dispVal='<a href=\'mailto:'+val2+'\'>' + val2 + '</a>';
									}else{
										dispVal = val2;
									}
									$('#app').append('<div style=\'border-bottom:1px solid #CCC;padding:2px 15px;\'><strong style=\'text-transform:uppercase;display:inline-block;width:275px;\'>'+ key2 +':</strong> '+dispVal+'</div>');
								}
							}
						});
					});
				});	
			}
		</script>
		
		<div id='app' class='popup' style='height:500px;overflow-y:auto;'>
		</div>
	";
	
	require 'template.php';

?>
<?php
	session_start();
	$pageTitle = "Properties";
	$propertiesTab = 'active';
	
	if($_SESSION['isLoggedIn'] == true){
		$head = "
			<script type='text/javascript' src='http://www.google.com/jsapi'></script>
			<script type='text/javascript'>
				google.load('visualization', '1', {packages:['table']});
				google.setOnLoadCallback(drawTable);
				function drawTable() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'Property');
					data.addColumn('number', 'Total Units');
					data.addColumn('number', 'Available Units');
					data.addColumn('number', 'Applicants');
					data.addColumn('number', 'Lease Rates');
					
					data.addRows(6);
					
					data.setCell(0, 0, formatLink('12 Bush Street APT #118, San Francisco, CA'));
					data.setCell(0, 1, 180);
					data.setCell(0, 2, 2);
					data.setCell(0, 3, 18);
					data.setCell(0, 4, 2200, '$2200 - $6500');
					
					data.setCell(1, 0, formatLink('54 Divisadero Street  APT #8, San Francisco, CA'));
					data.setCell(1, 1, 18);
					data.setCell(1, 2, 1);
					data.setCell(1, 3, 35);
					data.setCell(1, 4, 1800, '$1800 - $1800');
					
					data.setCell(2, 0, formatLink('83 Ellis Street APT #30, San Francisco, CA'));
					data.setCell(2, 1, 32);
					data.setCell(2, 2, 3);
					data.setCell(2, 3, 21);
					data.setCell(2, 4, 1950, '$1950 - $3200');
					
					data.setCell(3, 0, formatLink('92 Jones Street APT #11, San Francisco, CA'));
					data.setCell(3, 1, 60);
					data.setCell(3, 2, 18);
					data.setCell(3, 3, 14);
					data.setCell(3, 4, 2800, '$2800 - $3250');
					
					data.setCell(4, 0, formatLink('734 Howard Street APT #1, San Francisco, CA'));
					data.setCell(4, 1, 12);
					data.setCell(4, 2, 1);
					data.setCell(4, 3, 5);
					data.setCell(4, 4, 3200, '$3200 - $4500');

					$.getJSON('api/getPropertyDetails/?propertyID=1', function(result) {
						$.each(result, function(key, val) {
							data.setCell(5, 0, formatLink(result[key].address));
							data.setCell(5, 1, parseInt(result[key].units));
							data.setCell(5, 2, parseInt(result[key].units));
							data.setCell(5, 3, parseInt(result[key].units));
							data.setCell(5, 4, parseInt(result[key].rent), '$'+result[key].rent);
						});
					}).success(function() {
						var table = new google.visualization.Table(document.getElementById('table_div'));
						table.draw(data, {showRowNumber: false, sortColumn:0, allowHtml:true});
					});					
				}
			</script>
			";
		$pageContent = "<div id='table_div'></div>";
	}else{
		$pageContent = "<p class='grayContainer'>You must <a href='javascript:void(0);' onclick='regPop(\"login\");'>log in</a> to view your properties.</p>";
	}
	/*----content section-----*/
	
	$mainContent =  "
		<h2>Properties</h2>
		<br/>
		{$pageContent}
		<br/>
	";
	
	require 'template.php';

?>
<?php
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');
	session_start();
	if($_SESSION['isLoggedIn'] == true){
		$propertyID = $_GET['propertyID'];
		if($propertyID){
			if ($dbc = mysql_connect ('mysql', 'admin', 'pass67word89')){
				if (mysql_select_db ('rapplid')){
					$query = "SELECT * FROM `properties` WHERE `propertyID` = {$propertyID} LIMIT 0, 30 ";
					$sth = mysql_query($query);
					$rows = array();
					while($r = mysql_fetch_assoc($sth)) {
						$rows[] = $r;
					}
					if($rows){
						echo json_encode($rows);
					}else{
						echo '{"error" : "No information exists for propertyID '.$propertyID.'."}';
					}
				}
			}
		}else{
			echo '{"error" : "You must supply a propertyID."}';
		}
	}else{
		echo '{"error" : "Session expired."}';
	}
?>
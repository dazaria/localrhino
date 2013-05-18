<?php
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');
	session_start();
	if($_SESSION['isLoggedIn'] == true){
		$uid = $_GET['uid'];
		if($uid){
			if ($dbc = mysql_connect ('mysql', 'admin', 'pass67word89')){
				if (mysql_select_db ('rapplid')){
					$query = "SELECT * FROM `applications` WHERE `uid` = {$uid} LIMIT 0, 30 ";
					$sth = mysql_query($query);
					$rows = array();
					while($r = mysql_fetch_assoc($sth)) {
						$rows[] = $r;
					}
					if($rows){
						echo json_encode($rows);
					}else{
						echo '{"error" : "No information exists for uid '.$uid.'."}';
					}
				}
			}
		}else{
			echo '{"error" : "You must supply a uid."}';
		}
	}else{
		echo '{"error" : "Session expired."}';
	}
?>

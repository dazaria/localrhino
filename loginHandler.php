<?php
	if($_GET['logout'] == 'true'){
		session_start();
		session_unset(); 
		session_destroy();
	}	
	session_start();
	
	if($_SERVER['HTTP_REFERER']){
		$redirect = $_SERVER['HTTP_REFERER'];
	}else{
		$redirect = '.';
	}
	if (isset($_POST['email']) and isset($_POST['password']) ){
		if ($dbc = mysql_connect ('mysql', 'admin', 'pass67word89')){
			if (mysql_select_db ('rapplid')){
				$query = "	SELECT	* FROM	users WHERE (email='{$_POST['email']}')";
				if ($r = mysql_query ($query)){
					$result = mysql_fetch_array($r);
					
					if($_POST['isRegister'] == true){
						if ($result['email'] != $_POST['email'] ){		
							$rPassword = md5($_POST['password']);
							$rEmail = $_POST['email'] ; 
							$regQuery = "INSERT INTO users (`uid`, `email`, `password`, `last_login`) VALUES (NULL, '{$rEmail}', '{$rPassword}', '0000-00-00 00:00:00');";
							if (!@mysql_query ($regQuery)){
								$errorText = "<p>Error: <b>" . mysql_error() . "</b></p>";
							}else{
								//auto logs user in, eventually should have user log in
								$_SESSION['isLoggedIn'] = true;
								$_SESSION['email'] = $_POST['email'];
								$_SESSION['loggedin'] = time();
							}
						}else{
							$isError = true;
							$errorText = $_POST['email'] . ' is already registered.';
						}
					}else{
						if (md5($_POST['password']) == $result['password']){
							$_SESSION['isLoggedIn'] = true;
							$_SESSION['email'] = $result['email'];
							$_SESSION['loggedin'] = time();
						}
					}
				}
			}
		}
	}

	header("Location: {$redirect}");
?>
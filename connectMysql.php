<?
	$db_host = "localhost";
	$db_username = "root";
	$db_password = "1234";
	$db_name = "network_security";
	$db_link = @new mysqli($db_host, $db_username, $db_password, $db_name);
	if($db_link -> connect_error != ""){
		echo "connect fail!";
	}
	else{
		$db_link -> query("SET NAMES 'utf8'");
		//echo "login database successful!"."<br>";
	}

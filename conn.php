<?php
	$db_host = "localhost";
	$db_username = "root";
	$db_password = "1234";
	$db_name = "network_security";
	$db_link = @new mysqli($db_host, $db_username,$db_password,$db_name);
	//$sql_query_name = "SELECT * FROM contract_table";
    // $result_name = $db_link -> query($sql_query_name);
    // //這裡fetch_row()可以改成fetch_assoc() or fetch_array()效果不同
    // while($row_result_name = $result_name->fetch_assoc())
    // {
    //     foreach($row_result_name as $key => $value)
    //     {
    //         echo $key. " = ".$value."<br>";
    //     }
    //     echo "<hr>";
    // }
?>
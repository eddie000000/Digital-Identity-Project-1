<?php
require_once('conn.php');
$up_status = array();
if (isset($_COOKIE["id_arr"])) {
    foreach ($_COOKIE["status_arr"] as $name => $value)
        $up_status[$name] = $value;
} else {
    //echo "nothing";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["con_id"])) {
        $id = (int)$_POST["con_id"];
    }
    //echo $id;
}
if ($up_status[$id] == "1") {
    // $sql = sprintf(
    //     'UPDATE contract_table SET status = "%s" WHERE id = %d',
    //     "0",
    //     $id
    //   );
    $sql = "UPDATE contract_table SET con_status='0' WHERE id=$id+1";
    //$result = mysqli_query($db_link, $sql_query);
    if ($db_link->query($sql) === TRUE) {
        //echo "Record updated successfully";
    }

    $db_link->close();
    //$db_link->close();
    //echo $sql . '<br>';
}


//header('Location: index.php');
?>
<script language="javascript">
    alert("狀態已修改");
    top.location='userindex.php';
</script>
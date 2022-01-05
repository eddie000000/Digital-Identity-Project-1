<?php
//這是我要做robots.txt的額外檔案
require_once('conn.php');
$sql_query_name = "SELECT * FROM user";
$result_name = $db_link->query($sql_query_name);
$id = array();
$userid = array();
$name = array();
$gender = array();
$birthday = array();
$phone = array();
$parent = array();
$couple = array();
$address = array();
$identify_id = array();
$ct = 0;
while ($row_result_name = $result_name->fetch_assoc()) {
    $userid[$ct] = $row_result_name["User_id"];
    $name[$ct] = $row_result_name["User_name"];
    $gender[$ct] = $row_result_name["user_gender"];
    $birthday[$ct] = $row_result_name["user_birth"];
    $phone[$ct] = $row_result_name["user_phone"];
    $parent[$ct] = $row_result_name["user_parent"];
    $couple[$ct] = $row_result_name["user_spouse"];
    $address[$ct] = $row_result_name["user_addr"];
    $identify_id[$ct] = $row_result_name["user_idnum"];
    $ct++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All_User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-1 my-2 py-2 text-black border border-danger">姓名</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">用戶ID</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">性別</div>
            <div class="col-2 my-2 py-2 text-black border border-danger d-flex justify-content-center">生日</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">電話號碼</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">父母</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">伴侶</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">地址</div>
            <div class="col-1 my-2 py-2 text-black border border-danger">身分證號碼</div>
        </div>
        <div class="row">
        <?php
            for ($i = 0; $i < $ct; $i++) {
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $name[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $userid[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $gender[$i] . "</div>";
                echo "<div class='col-2 my-2 py-2 text-black border border-danger d-flex justify-content-center'>" . $birthday[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $phone[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $parent[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $couple[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $address[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black border border-danger'>" . $identify_id[$i] . "</div>";
                echo "<div class='col-1 my-2 py-2 text-black'></div>";
                echo "<div class='col-1 my-2 py-2 text-black'></div>";
                
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
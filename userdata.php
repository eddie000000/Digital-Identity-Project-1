<?php
require_once('conn.php');
//User_id是變數
$User_id =  $_COOKIE["uid"];
$sql_query_name = "SELECT * FROM user WHERE User_id = '{$User_id}'";
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
    <title>basic data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UserTable</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="userindex.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="userdata.php">My imformation</a>
                    </li>
                </ul>
            </div>
            <a><?php echo $User_id ?></a>
            <a>&emsp;</a>
            <form action="./login.php"><button class="btn btn-outline-success" type="submit">logout</button>
        </div>
    </nav>
    <div class="container my-3 border border-secondary rounded-3">
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">姓名: <?php echo "$name[0]"?></div>  
        </div>
        <hr>
        <div class="row fs-3">
                <div class="col my-3 d-flex justify-content-center">性別: <?php echo "$gender[0]"?></div>
        </div>
        <hr>
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">生日: <?php echo "$birthday[0]"?></div>
        </div>
        <hr>
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">電話: <?php echo "$phone[0]"?></div>
        </div>
        <hr>
        <h2>第二層級資料</h2>
        <hr>
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">父母: <?php echo "$parent[0]"?></div>
        </div>
        <hr>
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">配偶: <?php echo "$couple[0]"?></div>
        </div>
        <hr>
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">住址: <?php echo "$address[0]"?></div>
        </div>
        <hr>
        <div class="row fs-3">
            <div class="col my-3 d-flex justify-content-center">身分證: <?php echo "$identify_id[0]"?></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>

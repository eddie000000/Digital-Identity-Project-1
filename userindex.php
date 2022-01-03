<?php
//dbs connect and get value
#$User_id = "U0001";
$User_id =  $_COOKIE["uid"];
$contract_userid = array();
$contract_comapnyid = array();
$contract = array();
$id = array();
$endDate = array();
$status = array();
$cnt = 0;
#require_once('conn.php');
include('conn.php');
$sql_query_name = "SELECT * FROM contract WHERE User_id = '{$User_id}'";
$result_name = $db_link->query($sql_query_name);
$detail_link = "document.location='detail.php'";

while ($row_result_name = $result_name->fetch_assoc())
{
    $contract_userid = $row_result_name['User_id'];
    $contract_comapnyid = $row_result_name['Company_id'];
    $endDate[$cnt] = $row_result_name["Contract_end_date"];
    $status[$cnt] = $row_result_name["Contract_avail"];
    $contract[$cnt] = $row_result_name["Contract_name"];
    $id[$cnt] = $row_result_name["Contract_level"];


    $cnt++;
}
setcookie("cpname", $contract_comapnyid, time() + (86400 * 30), "/"); // 86400 = 1 day 
?>
<?php
//cookie storge
for ($i = 0; $i < $cnt; $i++) {
    setcookie("contract_arr[$i]", $contract[$i], time() + (86400 * 30), "/"); // 86400 = 1 day
}
for ($i = 0; $i < $cnt; $i++) {
    setcookie("id_arr[$i]", $id[$i], time() + (86400 * 30), "/"); // 86400 = 1 day
}
for ($i = 0; $i < $cnt; $i++) {
    setcookie("date_arr[$i]", $endDate[$i], time() + (86400 * 30), "/"); // 86400 = 1 day
}
for ($i = 0; $i < $cnt; $i++) {
    setcookie("status_arr[$i]", $status[$i], time() + (86400 * 30), "/"); // 86400 = 1 day
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
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
                        <a class="nav-link active" aria-current="page" href="./userindex.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./userdata.php">My imformation</a>
                    </li>
                </ul>
            </div>
            <a><?php echo $User_id ?></a>
            <a>&emsp;</a>
            <button class="btn btn-outline-success" type="submit">logout</button>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-8 my-2 p-2 text-black">Your Contract</div>
            <!-- <form class="d-flex col-4 my-2">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form> -->
        </div>
    </div>

    <div class="container border border-primary border-bottom-0 mt-2">
        <div class="row">
            <?php
            for ($i = 0; $i < $cnt; $i++) {
                //echo "<div class='container border border-primary border-bottom-0 mt-2'>";
                //echo "<div class='row border-bottom border-danger'>";
                echo "<div class='col-9 my-2 py-2 text-black border-bottom border-danger'>" . $contract[$i] . "</div>";
                echo "<div class='col-3 my-2 border-bottom border-danger'>
                        <form action='detail.php' method='post' style='margin:0px;display: inline;'>
                            <button type='submit' name='pri_id' value=" . $i . " class='btn btn-outline-primary m-1'>檢視合約資料</button>
                        </form>
                        <form action='update.php' method='post' style='margin:0px;display: inline;'>
                            <button type='submit' class='btn btn-outline-primary m-1' name='con_id' value=" . $i . ">終止合約</button>
                        </form>
                      </div>";
                //echo "<hr>";
            }
            ?>
        </div>
    </div>
    <!-- <div class="container border border-primary border-bottom-0 mt-2">
        <div class="row">
            <div class="col-9 py-2 text-black border-bottom border-danger">contract 1</div>
            <div class="col-3 border-bottom border-danger">
                <form action="detail.php" method="post" style="margin:0px;display: inline;">
                    <button type="submit" name="pri_id" value="slihla22" class="btn btn-outline-primary m-1">檢視合約資料</button>
                    <input type="submit">
                    <button type="button" onclick="document.location='detail.php'" class="btn btn-outline-primary m-1">檢視合約資料</button> 
                </form>
                <button type="button" class="btn btn-outline-primary m-1">終止合約</button>
            </div>
        </div>
    </div> -->
    <?php
    // if (isset($_COOKIE["id_arr"])) {
    //     foreach ($_COOKIE["contract_arr"] as $name => $value)
    //         echo "$name : $value <br>";
    //     echo "<hr>";
    //     foreach ($_COOKIE["id_arr"] as $name => $value)
    //         echo "$name : $value <br>";
    //     echo "<hr>";
    //     foreach ($_COOKIE["date_arr"] as $name => $value)
    //         echo "$name : $value <br>";
    //     echo "<hr>";
    //     foreach ($_COOKIE["status_arr"] as $name => $value)
    //         echo "$name : $value <br>";
    // }
    // else{
    //     echo "nothing";
    // }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>


</html>
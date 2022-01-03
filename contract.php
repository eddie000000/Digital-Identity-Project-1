<?php
//這是我要做robots.txt的額外檔案
require_once('conn.php');
$contract_userid = array();
$contract_comapnyid = array();
$contractname = array();
$id = array();
$endDate = array();
$status = array();
$level = array();
$cnt = 0;

$sql_query_name = "SELECT * FROM contract";
$result_name = $db_link->query($sql_query_name);

while ($row_result_name = $result_name->fetch_assoc()) {
    $contract_userid[$cnt] = $row_result_name['User_id'];
    $contract_comapnyid[$cnt] = $row_result_name['Company_id'];
    $endDate[$cnt] = $row_result_name["Contract_end_date"];
    $status[$cnt] = $row_result_name["Contract_avail"];
    $contractname[$cnt] = $row_result_name["Contract_name"];
    $level[$cnt] = $row_result_name["Contract_level"];
    $cnt++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All_Contract</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-2 my-2 py-2 text-black border border-danger">合約名字</div>
            <div class="col-2 my-2 py-2 text-black border border-danger">用戶ID</div>
            <div class="col-2 my-2 py-2 text-black border border-danger">公司ID</div>
            <div class="col-2 my-2 py-2 text-black border border-danger">是否存取</div>
            <div class="col-2 my-2 py-2 text-black border border-danger">資料等級</div>
            <div class="col-2 my-2 py-2 text-black border border-danger">到期日期</div>
        </div>
        <div class="row">
        <?php
            for ($i = 0; $i < $cnt; $i++) {
                echo "<div class='col-2 my-2 py-2 text-black border border-danger'>" . $contractname[$i] . "</div>";
                echo "<div class='col-2 my-2 py-2 text-black border border-danger'>" . $contract_userid[$i] . "</div>";
                echo "<div class='col-2 my-2 py-2 text-black border border-danger'>" . $contract_comapnyid[$i] . "</div>";
                echo "<div class='col-2 my-2 py-2 text-black border border-danger'>" . $status[$i] . "</div>";
                echo "<div class='col-2 my-2 py-2 text-black border border-danger'>" . $level[$i] . "</div>";
                echo "<div class='col-2 my-2 py-2 text-black border border-danger'>" . $endDate[$i] . "</div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
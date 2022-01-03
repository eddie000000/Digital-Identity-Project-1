<?php
// $User_id = "us12344";
include('conn.php');
$User_id = $_COOKIE["uid"];
$cpn = $_COOKIE["cpname"];
$sql = "SELECT Company_name FROM company WHERE Company_id='{$cpn}'";
$Company_info = $db_link->query($sql);
$cname = $Company_info->fetch_assoc();
$out_contract = array();
$out_date = array();
$out_status = array();
if (isset($_COOKIE["id_arr"])) {
    foreach ($_COOKIE["contract_arr"] as $name => $value)
        $out_contract[$name] = $value;
    foreach ($_COOKIE["date_arr"] as $name => $value)
        $out_date[$name] = $value;
    foreach ($_COOKIE["status_arr"] as $name => $value)
        $out_status[$name] = $value;
} else {
    echo "nothing";
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pri_id"])) {
        $id = (int)$_POST["pri_id"];
    }
    //echo $id;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
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
                        <a class="nav-link active" aria-current="page" href="userindex.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userdata.php">My imformation</a>
                    </li>
                </ul>
            </div>
            <a><?php echo $User_id ?></a>
            <a>&emsp;</a>
            <form action="./login.php"><button class="btn btn-outline-success" type="submit">logout</button></form>
        </div>
    </nav>
    <div class="container">
        <div class="row my-3">
            <div class="col-6"><?php echo "$out_contract[$id]";?></div>
        </div>
        <div class="row my-3">
            <div class="col-4">公司</div>
            <div class="col-4">合約日期</div>
            <div class="col-4">存取狀態</div>
        </div>
        <div class="row">
            <div class="col-4"><?echo $cname['Company_name'];?></div>
            <div class="col-4"><?php echo "$out_date[$id]";?></div>
            <div class="col-4"><?php echo "$out_status[$id]";?></div>
        </div>
        <div class="row my-3">
            <div class="col"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
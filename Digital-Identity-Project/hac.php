<?php
$account = $_GET['account'];
$password = $_GET['password'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        釣魚資訊
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/style/bootstrap.css">
    <link rel="stylesheet" href="./assets/style/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <div class="col-4 position-absolute top-50 start-50 translate-middle">
        <div class="card">
            <div class="card-body">
                <h4 class="card-text text-center mb-5" style="color:red">請注意登入時網站網址</h4>
                    <div class="row mb-5">
                        <label for="account" class="col-sm-2 col-form-label">帳號</label>
                        <div class="col-sm-10">
                            <a  class="form-control"><?echo $account;?></a>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="password" class="col-sm-2 col-form-label">密碼</label>
                        <div class="col-sm-10">
                            <a  class="form-control"><?echo $password;?></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
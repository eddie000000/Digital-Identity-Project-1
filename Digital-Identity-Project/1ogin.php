<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        1ogin Page登入頁面 
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
                <h4 class="card-text text-center mb-5">資料管理系統</h4>
                <form action="hac.php" method="get">
                    <div class="row mb-5">
                        <label for="account" class="col-sm-2 col-form-label">帳號</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="account" name="account" placeholder="請輸入帳號">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="password" class="col-sm-2 col-form-label">密碼</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <small>第一次登入請輸入預設密碼：123456</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>
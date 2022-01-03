<?
header("Connect-Type: text/html; charset = utf-8");
include("connectMysql.php");
#$Company_id = "C0001";
$Company_id = $_COOKIE["cid"];
$sql_query = "SELECT Company_id, Company_name, Company_addr, Company_repre, Company_phone, Company_pubkey, Company_prikey FROM company WHERE Company_id='{$Company_id}'";
$Company_info = $db_link->query($sql_query);

$sql_query = "SELECT User_id, Company_id, Contract_end_date, Contract_avail, Contract_name, Contract_level FROM contract WHERE Company_id='{$Company_id}'";
$All_Contract_info = $db_link->query($sql_query);
if (array_key_exists('button', $_POST)) {
    button();
}
function encrypt($data, $pubkey) 
    {
        //公鑰加密 
        $pubPem = chunk_split($pubkey, 64, "\n");
        $pubPem = "-----BEGIN PUBLIC KEY-----\n" . $pubPem . "-----END PUBLIC KEY-----\n";
        //var_dump($pubPem);

        define('RSA_PUBLIC', $pubPem);
        $public_key = openssl_pkey_get_public(RSA_PUBLIC); 
        if(!$public_key)
        {
            die('公鑰不可用');  
        }
        //第一個引數是待加密的資料只能是string，第二個引數是加密後的資料,第三個引數是openssl_pkey_get_public返回的資源型別,第四個引數是填充方式
        $return_en = openssl_public_encrypt($data, $crypted, $public_key);
        if(!$return_en)
        {
            return('加密失敗,請檢查RSA祕鑰');
        }
        $eb64_cry = base64_encode($crypted);
        //echo "公鑰加密資料：".$eb64_cry;
        //echo "<hr>";
        return $eb64_cry;
    }

    function decrypt($eb64_cry_data, $prikey)
    {
        //私鑰解密
        $priPem = chunk_split($prikey, 64, "\n" );
        $priPem = "-----BEGIN PRIVATE KEY-----\n" . $priPem . "-----END PRIVATE KEY-----\n";
        //var_dump($priPem);
        define('RSA_PRIVATE', $priPem);

        $private_key = openssl_pkey_get_private(RSA_PRIVATE);
        if(!$private_key)
        {
            die('私鑰不可用');
        }
        $return_de = openssl_private_decrypt(base64_decode($eb64_cry_data), $decrypted, $private_key);
        if(!$return_de)
        {
            return('解密失敗,請檢查RSA祕鑰');
        }
        //echo "私鑰解密資料:".$decrypted;
        //echo "<hr>";
        return $decrypted;
    }
//$db_link->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        合約資訊管理系統
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/style/bootstrap.css">
    <link rel="stylesheet" href="./assets/style/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <? $row = $Company_info->fetch_assoc(); 
        $pubk = $row['Company_pubkey'];
        $prik = $row['Company_prikey'];
    ?>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand">合約資訊管理系統</a>
                <div class="d-flex align-items-center">
                    <img src="https://fakeimg.pl/48x48" class="rounded-circle" alt="User image">
                    <?
                    $temp = $row['Company_name'];
                    echo "<button type='button' class='btn mx-3' data-bs-toggle='modal' data-bs-target='#companyName'>$temp</button>"
                    ?>

                    <form action="./login.php"> <input type="submit" class="btn btn-outline-primary" value="登出" />
                </div>
            </div>
        </nav>
    </div>

    <div class="modal fade" id="companyName" tabindex="-1" aria-labelledby="companyNameLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bootstrap border-0">
                    <?
                    $temp = $row['Company_name'];
                    echo "<h5 class='modal-title' id='companyNameLabel'> $temp </h5>";
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-evenly align-items-center">
                    <img class="rounded-circle" src="https://fakeimg.pl/128x128/" alt="logo" srcset="">
                    <div>
                        <?
                        $temp = $row['Company_repre'];
                        echo "<p>代表人: $temp </p>";
                        $temp = $row['Company_addr'];
                        echo "<p> $temp </p>";
                        $temp = $row['Company_phone'];
                        echo "<a class='btn p-0' href='tel:+$temp'>$temp</a>"
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--     <div class="container d-flex justify-content-end py-3">
        <form action="" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="輸入關鍵字搜尋合約">
                <button type="submit" class="btn btn-primary">
                    <span class="material-icons align-middle">search</span>
                </button>
            </div>
        </form>
    </div> -->

    <div class="modal fade" id="newContract1" tabindex="-1" aria-labelledby="newContract1Label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="addContract.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newContract1Label">簽署新合約</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="px-4">
                            <label for="IDNumber" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="IDNumber" name="IDNumber" placeholder="請插入數位身分證">
                        </div>
                        <div class="d-none">
                            <input type="text" name="ContractName" value="合約1">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">取消</button>
                        <input type="submit" name="button" class="btn btn-primary" value="新增" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="newContract2" tabindex="-1" aria-labelledby="newContract2Label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="addContract.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newContract2Label">簽署新合約</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="px-4">
                            <label for="IDNumber" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="IDNumber" name="IDNumber" placeholder="請插入數位身分證">
                        </div>
                        <div class="d-none">
                            <input type="text" name="ContractName" value="合約2">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">取消</button>
                        <input type="submit" name="button" class="btn btn-primary" value="新增" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?
    $temp_contract1_info = array();
    $temp_contract2_info = array();
    while ($row_contract_info = $All_Contract_info->fetch_assoc()) {
        if (strcmp($row_contract_info['Contract_name'], "申請合約")) 
        {
            array_push($temp_contract2_info, $row_contract_info);
        } 
        else 
        {
            array_push($temp_contract1_info, $row_contract_info);
        }
    }
    //echo '<pre>'; print_r($temp_contract2_info); echo '</pre>';
    //echo '<pre>'; print_r($temp_contract1_info); echo '</pre>';
    //echo $temp_contract_info[1]['Contract_name'];
    ?>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="d-flex align-items-center">
                    <? echo $temp_contract1_info[0]['Contract_name'] ?>
                    <?
                    $temp = $temp_contract1_info[0]['Contract_level'];
                    echo "<span class='badge rounded-pill bg-success ms-4'>$temp</span>"
                    ?>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newContract1">簽署新合約</button>
                    <button type="button" class="btn btn-outline-primary fw-bold px-2 ms-4" data-bs-toggle="collapse" data-bs-target="#contract-1" aria-expanded="false" aria-controls="contract-1">
                        <span class="material-icons align-middle">expand_more</span>
                    </button>
                </div>
                <div class="collapse" id="contract-1">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col">使用者名稱</th>
                                    <th scope="col">合約結束日期</th>
                                    <th scope="col">存取個資狀態</th>
                                    <th scope="col">合約到期通知</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                for ($i = 0; $i < count($temp_contract1_info); $i++) 
                                {
                                    echo "<tr>";
                                    $temp = $temp_contract1_info[$i]['User_id'];
                                    $sql_query = "SELECT User_name, user_gender, user_birth, user_phone FROM user WHERE User_id='{$temp}'";
                                    $row_User_name = $db_link->query($sql_query);
                                    $row = $row_User_name->fetch_assoc();

                                    $enc_User_name_L1 = encrypt((string)$row['User_name'],$pubk);
                                    $enc_User_gender_L1 = encrypt((string)$row['user_gender'],$pubk);
                                    $enc_User_birth_L1 = encrypt((string)$row['user_birth'],$pubk);
                                    $enc_User_phone_L1 = encrypt((string)$row['user_phone'],$pubk);

                                    //$U_name = $row['User_name'];
                                    $U_name = decrypt($enc_User_name_L1, $prik);
                                    $U_name[3] = 'X';
                                    $U_name[4] = $U_name[6];
                                    $U_name[5] = $U_name[7];
                                    $U_name[6] = $U_name[8];
                                    $U_name[7] = ' ';
                                    $U_name[8] = ' ';
                                    echo "<td> $U_name </td>";

                                    $temp = $temp_contract1_info[$i]['Contract_end_date'];
                                    echo "<td> $temp </td>";

                                    if ($temp_contract1_info[$i]['Contract_avail']) 
                                    {
                                        echo "<td> 可以存取 </td>";
                                    } else 
                                    {
                                        echo "<td> 無法存取 </td>";
                                    }
                                ?>
                                    <td><button type="button" class="btn btn-outline-primary"><span class="material-icons align-middle">notifications</span></button></td>
                                    </tr>
                                <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="d-flex align-items-center">
                    <? echo $temp_contract2_info[0]['Contract_name'] ?>
                    <?
                    $temp = $temp_contract2_info[0]['Contract_level'];
                    echo "<span class='badge rounded-pill bg-success ms-4'>$temp</span>"
                    ?>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newContract2">簽署新合約</button>
                    <button type="button" class="btn btn-outline-primary fw-bold px-2 ms-4" data-bs-toggle="collapse" data-bs-target="#contract-2" aria-expanded="false" aria-controls="contract-2">
                        <span class="material-icons align-middle">expand_more</span>
                    </button>
                </div>
                <div class="collapse" id="contract-2">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col">使用者名稱</th>
                                    <th scope="col">合約結束日期</th>
                                    <th scope="col">存取個資狀態</th>
                                    <th scope="col">合約到期通知</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                for ($i = 0; $i < count($temp_contract2_info); $i++) {
                                    echo "<tr>";
                                    $temp = $temp_contract2_info[$i]['User_id'];
                                    $sql_query = "SELECT User_name,user_gender,user_birth, user_phone, user_parent, user_spouse, user_addr, user_idnum FROM user WHERE User_id='{$temp}'";
                                    $row_User_name = $db_link->query($sql_query);
                                    $row = $row_User_name->fetch_assoc();

                                    $enc_User_name = encrypt((string)$row['User_name'],$pubk);
                                    $enc_User_gender = encrypt((string)$row['user_gender'],$pubk);
                                    $enc_User_birth = encrypt((string)$row['user_birth'],$pubk);
                                    $enc_User_phone = encrypt((string)$row['user_phone'],$pubk);
                                    $enc_User_parent = encrypt((string)$row['user_parent'],$pubk);
                                    $enc_User_spouse = encrypt((string)$row['user_spouse'],$pubk);
                                    $enc_User_addr = encrypt((string)$row['user_addr'],$pubk);
                                    $enc_User_idnum = encrypt((string)$row['user_idnum'],$pubk);
                                    
                                    //$U_name = $row['User_name'];
                                    $U_name = decrypt($enc_User_name ,$prik);
                                    //$U_name = $enc_User_name;
                                    $U_name[3] = 'X';
                                    $U_name[4] = $U_name[6];
                                    $U_name[5] = $U_name[7];
                                    $U_name[6] = $U_name[8];
                                    $U_name[7] = ' ';
                                    $U_name[8] = ' ';
                                    echo "<td> $U_name </td>";

                                    $temp = $temp_contract2_info[$i]['Contract_end_date'];
                                    echo "<td> $temp </td>";

                                    if ($temp_contract2_info[$i]['Contract_avail']) {
                                        echo "<td> 可以存取 </td>";
                                    } else {
                                        echo "<td> 無法存取 </td>";
                                    }
                                    
                                ?>
                                    <td><button type="button" class="btn btn-outline-primary"><span class="material-icons align-middle">notifications</span></button></td>
                                    </tr>
                                <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <script src="./assets/js/vendors.js"></script>
    <script src="./assets/js/all.js"></script>
</body>

</html>
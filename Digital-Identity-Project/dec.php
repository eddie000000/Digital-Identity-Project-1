<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<title>HACK-Decrypt</title>
</head>
<body>
    <?php
    function decrypt($eb64_cry_data, $prikey)
    {
        //私鑰解密
        $priPem = chunk_split($prikey, 64, "\n" );
        $priPem = "-----BEGIN PRIVATE KEY-----\n" . $priPem . "-----END PRIVATE KEY-----\n";
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
        echo "私鑰解密資料:".$decrypted;
        return $decrypted;
    }
        $keyinput = "";
        $ecndata="";
        
        if (isset($_POST['submit1'])) 
        {
            $ecndata = $_POST['encdata'];
        }
        if (isset($_POST['submit'])) 
        {
            $keyinput = $_POST['prik'];

            if($keyinput!=NULL)
            $result = decrypt($eb64_cry_data, $keyinput);
        }
        
    ?>
    <form  method="post">
    Encrypt data<input type="text" name="encdata" id="encdata" placeholder="encrypt data">
    <button type="submit1" name="submit">submit</button>
    </form>

    <form action="" method="post">
    Private Key to decrypt<input type="text" name="prik" id="prik" placeholder="private key">
    <button type="submit" name="submit">SUBMIT to decrypt data</button>
    </form>



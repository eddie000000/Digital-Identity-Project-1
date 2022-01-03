<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>firstlogin.php</title>
</head>
<body>
<?php
    $password=""; $checkpassword="";
    if ( isset($_POST["password"]) )
      $password = $_POST["password"];
    if ( isset($_POST["checkpassword"]) )
      $checkpassword = $_POST["checkpassword"];
    $user = $_COOKIE["member"];
    
    $submit = @$_POST["check"];

    if ($submit == "確認") {
      if (strlen($password) >= 6 && $password == $checkpassword ){
        $sql_set_password = "UPDATE account SET password = '$password', First_time_login = 0  WHERE account ='$user'";
        mysqli_query(mysqli_connect("localhost","root","1234","network_security"), $sql_set_password);
        mysqli_close(mysqli_connect("localhost","root","1234","network_security"));
        echo "<center><font color='Green'>";
        echo "密碼更改成功!<br/>";
        echo "</font>";
      }else{
        echo "<center><font color='red'>";
        echo "密碼長度錯誤或再次輸入錯誤!<br/>";
        echo "</font>";
      }
    }
    
?>

<form action="firstlogin.php" method="post" >
  <div align="center" style="background-color:#00000000;padding:10px;margin-bottom:5px;">
    <br>
    <h1 ><font color='green'><?php print($user) ?><br/>第一次登入更改密碼 </font></h1>
    <label for="password">  輸入新密碼:</label>
    <input type="password" name="password" id="password" required autofocus/>
    <br>  
    <br> 
    <label for="checkpassword">再次輸入密碼:</label>
    <input type="password" name="checkpassword" id="password" required/>
    <br>
    <br>
    <input type="submit" name="check" value="確認"/>
    <input type="button" value="回到登入頁面" onclick="location.href='login.php'">
  </div>
</form>
</body>
</html>
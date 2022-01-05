<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>login.php</title>
</head>
<body>

<?php
   ini_set('display_errors','off');
   function genOTP($n) { 
       
      $numbers = "0123456789"; 
      $result = ""; 
     
      for ($i = 1; $i <= $n; $i++) { 
          $result .= substr($numbers, (rand()%(strlen($numbers))), 1);
      } 
      return $result; 
   } 
   // session_start();  // 啟用交談期
   $account = "";  $password = "";
   // 取得表單欄位值
   if ( isset($_POST["account"]) )
      $account = $_POST["account"];
   if ( isset($_POST["password"]) )
      $password = $_POST["password"];
   // 檢查是否輸入使用者名稱和密碼
   if ($account != "" && $password != "") {
      // 建立MySQL的資料庫連接 
      $link = mysqli_connect("localhost","root","1234","network_security")
         or die("無法開啟MySQL資料庫連接!<br/>");
      //送出UTF8編碼的MySQL指令
      mysqli_query($link, 'SET NAMES utf8'); 
      // 建立SQL指令字串
      $submit = $_POST["login"];

      if ($submit == "登入") {
         $sql = "SELECT * FROM account WHERE password='";
         $sql.= $password."' AND account='".$account."' AND First_time_login = 0";
         // echo $account;
         // echo $password;
         // 執行SQL查詢
         $result = mysqli_query($link, $sql);
         $total_records = mysqli_num_rows($result);
         // 是否有查詢到使用者記錄
         if ( $total_records > 0 ) {
            // 成功登入, 指定Session變數
            // $_SESSION["login_session"] = true;
            $sql_user_type = "SELECT user_company FROM account WHERE account ='".$account."'";
            $user_type = mysqli_query($link, $sql_user_type)->fetch_assoc();
            $sql_id = "SELECT uid_cid FROM account WHERE account ='".$account."'";
            $uid_cid = mysqli_query($link, $sql_id)->fetch_assoc();
   
            echo "公司或使用者:".$user_type["user_company"];
            if ( $user_type["user_company"] == 0 ){
               setcookie("uid", $uid_cid["uid_cid"], time() + (86400 * 30), "/"); // 86400 = 1 day   
               header("Location: userindex.php");
            }
            if ( $user_type["user_company"] == 1 ){
               setcookie("cid", $uid_cid["uid_cid"], time() + (86400 * 30), "/"); // 86400 = 1 day  
               header("Location: companyindex.php");
            }
         } else {  // 登入失敗
            echo "<center><font color='red'>";
            echo "使用者名稱或密碼錯誤!<br/>";
            echo "</font>";
            // $_SESSION["login_session"] = false;
         }
      }
      if ($submit == "第一次登入") {
         $sql_first_login = "SELECT First_time_login FROM account WHERE password ='";
         $sql_first_login.= $password."' AND account='".$account."'";
         $first_login = mysqli_query($link, $sql_first_login)->fetch_assoc();
         if ($first_login["First_time_login"] == 1){
            setcookie("member", $account, time() + (86400 * 30), "/"); // 86400 = 1 day   
            header("Location: firstlogin.php"); 
         }else{
            echo "<center><font color='blue'>";
            echo "可能錯誤原因:<br/>1. 非第一次登入<br/>2. OPT錯誤<br/>3. 使用者名稱錯誤";
            echo "</font>";            
         } 

      }
      mysqli_close($link);  // 關閉資料庫連接  
   }
?>
<form action="login.php" method="post" >
   <div align="center" style="background-color:#00000000;padding:10px;margin-bottom:10px;">
      <br>
      <h1 >控制人民之統一天下 </h1>
      <label for="account">帳號:</label>
      <input type="text" name="account" id="account" required autofocus/>
      <br>  
      <br> 
      <label for="password">密碼:</label>
      <input type="password" name="password" id="password" required/>
      <br>
      <br>
      <input type="submit" name="login" value="登入"/>
      <input type="submit" name="login" value="第一次登入"/>
      <br>
      <br>
      <div>
         第一次登入請輸入一次性密碼：
         <?php    
            $opt = genOTP(6);
            echo $opt;
            $sql_opt = "UPDATE account SET password = '$opt' WHERE First_time_login = 1";
            mysqli_query(mysqli_connect("localhost","root","1234","network_security"), $sql_opt);
            mysqli_close(mysqli_connect("localhost","root","1234","network_security"));
         ?>
      </div>
   </div>
</form>
</body>
</html>
<?
    $Post_user_id = $_POST["IDNumber"];
    $Post_Contract_name = $_POST["ContractName"];
    //echo $Post_Contract_name;
    include("connectMysql.php");
    if($Post_Contract_name == "合約1")
    {
        $sql_insert = "INSERT INTO contract(User_id, Company_id, Contract_end_date, Contract_avail, Contract_name, Contract_level) VALUES ('". $Post_user_id ."', 'C0001', '2022-02-10', 1, '合約1', '第一級')";
    }
    else
    {
        $sql_insert = "INSERT INTO contract(User_id, Company_id, Contract_end_date, Contract_avail, Contract_name, Contract_level) VALUES ('". $Post_user_id ."', 'C0001', '2022-02-10', 1, '合約2', '第二級')";
    }
    //echo $sql_insert;
    $stmt = $db_link->query($sql_insert);
    echo "<script>location.href='index.php';</script>";
?>
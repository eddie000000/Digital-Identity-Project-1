<?
header("Connect-Type: text/html; charset = utf-8");
include("connectMysql.php");
$Company_id = 'C0001';
$sql_query = "SELECT * FROM company WHERE Company_id={$Company_id}";
$Company_info = $db_link->query($sql_query);

$sql_query = "SELECT * FROM contract WHERE Company_id={$Company_id}";
$All_Contract_info = $db_link->query($sql_query);

$db_link->close();
?>
---
title: Boostrap Index
layout: ./app/layout.ejs
engine: ejs
current: index
---

<div class="container d-flex justify-content-between py-3">
    <button type="button" class="btn btn-primary">新增合約</button>
    <form action="">
        <input type="text" class="form-control" placeholder="輸入關鍵字搜尋合約">
    </form>
</div>

<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <div class="d-flex align-items-center">
                合約1
                <span class="badge rounded-pill bg-success ms-4">第一級</span>
                <a class="btn btn-primary ms-auto" href="#" role="button">檢視合約資料</a>
                <button type="button" class="btn btn-primary ms-4">簽署新合約</button>
                <button type="button" class="btn btn-outline-primary fw-bold px-2 ms-4" data-bs-toggle="collapse" data-bs-target="#contract-1" aria-expanded="false" aria-controls="contract-1">
                    <span class="material-icons align-middle">expand_more</span>
                </button>
            </div>
            <div class="collapse" id="contract-1">
                  <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi dolorem quisquam porro totam labore omnis ipsa quia corporis unde ducimus deleniti repellat a vitae distinctio alias qui optio, dicta repellendus fuga! Eos quos voluptatum ipsum sunt, reiciendis veritatis sequi incidunt iusto adipisci similique totam vel exercitationem magnam maxime, quasi enim?</p>
              </div>
        </li>
        <li class="list-group-item">
            <div class="d-flex align-items-center">
                合約2
                    <span class="badge rounded-pill bg-success ms-4">第二級</span>
                <a class="btn btn-primary ms-auto" href="#" role="button">檢視合約資料</a>
                <button type="button" class="btn btn-primary ms-4">簽署新合約</button>
                <button type="button" class="btn btn-outline-primary fw-bold px-2 ms-4" data-bs-toggle="collapse" data-bs-target="#contract-2" aria-expanded="false" aria-controls="contract-2">
                    <span class="material-icons align-middle">expand_more</span>
                </button>
            </div>
            <div class="collapse" id="contract-2">
                  <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi dolorem quisquam porro totam labore omnis ipsa quia corporis unde ducimus deleniti repellat a vitae distinctio alias qui optio, dicta repellendus fuga! Eos quos voluptatum ipsum sunt, reiciendis veritatis sequi incidunt iusto adipisci similique totam vel exercitationem magnam maxime, quasi enim?</p>
              </div>
        </li>
    </ul>
</div>

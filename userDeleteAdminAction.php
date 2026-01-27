<?php

require_once './db.php';
require_once './lib.php';

$user_idx = $_GET["idx"];
$store = db::fetch("select * from stores where admin_idx = '$user_idx'");

db::exec("update stores set admin_idx = null where idx = '$store->idx'");
db::exec("update user set admin = '0' where idx = '$user_idx'");

alert("서점 관리자가 삭제되었습니다");
move("./userAdmin.php");
<?php

require_once './db.php';
require_once './lib.php';

extract($_POST);

db::exec("update stores set admin_id = '$user_idx' where idx = '$store_idx'");
db::exec("update user set admin = '1' where idx = '$user_idx'");

alert("서점 관리자가 추가되었습니다");
move("./userAdmin.php");
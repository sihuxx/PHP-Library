<?php

require_once './db.php';
require_once './lib.php';

extract($_POST);

if(db::fetch("select * from stores where idx = '$store_idx' and admin_idx is null")) {
  db::exec("update stores set admin_idx = '$user_idx' where idx = '$store_idx'");
  db::exec("update user set admin = '1' where idx = '$user_idx'");
  alert("서점 관리자가 추가되었습니다");
  move("./userAdmin.php");
} else {
  alert("이미 서점 관리자가 존재하는 서점입니다");
  move("./userAdmin.php");
}

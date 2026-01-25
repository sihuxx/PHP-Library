<?php

require_once './db.php';
require_once './lib.php';

extract($_POST);

$file = $_FILES['file'];
$path = './images/stores/'. $file["name"];

if(move_uploaded_file($file["tmp_name"], $path)) {
  db::exec("update stores set title = '$title', des = '$des', img = '$path' where idx = '$idx'");
  alert("서점 정보가 수정되었습니다");
  move('./storeAdmin.php');
  } else {
    alert("파일 업로드에 실패했습니다");
    back();
}
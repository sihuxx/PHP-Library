<?php

require_once './db.php';
require_once './lib.php';

extract(($_POST));

$file = $_FILES['file'];
$path = './images/stores/' . $file['name'];

if(move_uploaded_file($file["tmp_name"], $path)) {
  db::exec("insert into stores(title, des, img) values('$title', '$des', '$path')");
  alert("서점 등록에 성공하셨습니다");
  move('./storeAdmin.php');
} else {
  alert("파일 업로드에 실패했습니다");
  back();
}
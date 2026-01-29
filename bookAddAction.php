<?php

require_once './db.php';
require_once './lib.php';

extract($_POST);

$file = $_FILES["file"];
$path = './images/books/' . $file["name"];

if (move_uploaded_file($file["tmp_name"], $path)) {
  db::exec("insert into book(title, des, img, stock, store_idx) values('$title', '$des', '$path', '$stock', '$store_idx')");
  alert("책이 등록되었습니다");
  move("./bookAdmin.php");
} else {
  alert("파일 업로드에 실패했습니다");
  back();
}
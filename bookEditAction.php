<?php

require_once './db.php';
require_once './lib.php';

extract($_POST);
$file = $_FILES["file"];
$path = './images/books/' . $file['name'];

if (move_uploaded_file($file['tmp_name'], $path)) {
  db::exec("update book set title = '$title', des = '$des', img ='$path', stock = '$stock', count ='$count'");
  alert("책 정보가 수정되었습니다");
  move("./bookAdmin.php");
} else {
  db::exec("update book set title = '$title', des = '$des', stock = '$stock', count ='$count'");
  alert("책 정보가 수정되었습니다");
  move("./bookAdmin.php");
}
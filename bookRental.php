<?php

require_once './db.php';
require_once './lib.php';

$user = $_SESSION['ss'];
$book_idx = $_POST["book_idx"];
$book = db::fetch("select * from book where idx = '$book_idx'");
$store_idx = $_POST["store_idx"];

if(db::fetch("select * from user_book where user_idx = '$user->idx' and book_idx = '$book_idx' and is_rental = '1'")) {
  alert("이미 대여한 책입니다");
  move("./storeList.php?idx=$store_idx");
} else {
  db::exec("insert into user_book(user_idx, book_idx, period, is_rental;) values ('$user->idx', '$book_idx', '7', '1')");
  db::exec("update book set count = count - 1 where idx = '$book_idx'");

  alert("책 대여가 완료되었습니다");
  move("./storeList.php?idx=$store_idx");
}

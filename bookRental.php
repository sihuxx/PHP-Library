<?php

require_once './db.php';
require_once './lib.php';

$user = $_SESSION['ss'];
$book_idx = $_POST["book_idx"];
$book = db::fetch("select * from book where idx = '$book_idx'");
$store_idx = $_POST["store_idx"];
$userBook = db::fetchAll("select * from user_book where book_idx = $book->idx and is_rental = '1'");

if($book->stock - count($userBook) < 1) {
  alert("재고가 없는 책입니다.");
  return;
}

if(db::fetch("select * from user_book where user_idx = '$user->idx' and book_idx = '$book_idx' and is_rental = '1'")) {
  alert("이미 대여 중인 책입니다");
  move("./store.php?idx=$store_idx");
} else {
  db::exec("insert into user_book(user_idx, book_idx, store_idx, period, is_rental) values ('$user->idx', '$book_idx', '$store_idx', '7', '1')");
  alert("책 대여가 완료되었습니다");
  move("./store.php?idx=$store_idx");
}

<?php

require_once './db.php';
require_once './lib.php';

$user = $_SESSION['ss'];
$book_idx = $_POST["book_idx"];

db::exec("insert into user_book(user_idx, book_idx) values ('$user->idx', '$book_idx')");
db::exec("update book set count = count - 1 where idx = '$book_idx'");

alert("책 대여가 완료되었습니다");
move('./storeList.php');
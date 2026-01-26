<?php

require_once './db.php';
require_once './lib.php';

$book_idx = $_POST["book_idx"];
$user = $_SESSION["ss"];

db::exec("delete from user_book where user_idx = '$user->idx' and book_idx = '$book_idx'");
db::exec("update book set count = count + 1 where idx = '$book_idx'");

alert("책 반납이 완료되었습니다");
move("./myProfile.php");

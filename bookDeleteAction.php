<?php

require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];

db::exec("delete from book where idx = '$idx'");

alert("책이 삭제되었습니다");
move("./bookAdmin.php");
<?php

require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];

db::exec("delete from stores where idx = '$idx'");

alert(("서점이 삭제되었습니다"));
move("./storeAdmin.php");
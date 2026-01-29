<?php

require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];

DB::exec("delete from user where idx = '$idx'");

alert("탈퇴 처리 되었습니다");
move("./userAdmin.php");
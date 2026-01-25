<?php

require_once './db.php';
require_once './lib.php';

session_destroy();

alert("로그아웃 성공");
move('./index.php');
<?php

require_once './db.php';
require_once './lib.php';
extract($_POST);


if ($type == "reg") {
    extract($_POST);

    if (db::fetch("select * from user where id = '$id'")) {
        alert("이미 존재하는 아이디입니다");
        back();
    } else {
        [$h_psw, $salt] = hashPsw($psw);
        db::exec("insert into user(id, psw, email, name, salt) values('$id', '$h_psw', '$email', '$name', '$salt')");
        alert("회원가입 성공");
        move("./index.php");
    }
} else {
    extract($_POST);

    $user = db::fetch("select * from user where id = '$id'");
    if ($user) {
        $input_h_psw = hash("sha256", $psw . $user->salt);
        if ($input_h_psw == $user->psw) {
            $_SESSION["ss"] = $user;
            alert("로그인 성공");
            move("./index.php");
        } else {
            alert("비밀번호가 일치하지 않습니다");
            back();
        }
    } else {
        alert("아이디가 일치하지 않습니다");
        back();
    }
}

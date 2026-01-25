<?php
require_once './db.php';
$user = $_SESSION["ss"] ?? false;
?>

<header>
    <div class="header-content">
        <a href="./index.php" class="logo">
            <img src="./images/logo.png" alt="">
        </a>

        <?php if (!$user) { ?>
            <nav>
                <ul>
                    <li><a href="./reg.php">회원가입</a></li>
                </ul>
                <ul>
                    <li><a href="./login.php">로그인</a></li>
                </ul>
            </nav>
        <?php } else if ($user->admin == 1) { ?>
            <nav>
                <ul>
                    <li><a href="#">책 관리</a></li>
                </ul>
                <ul>
                    <li><a href="#">책 대여 현황 조회</a></li>
                </ul>
                <ul>
                    <li><a><?= $user->name ?>님</a></li>
                </ul>
                <ul>
                    <li><a href="./logout.php">로그아웃</a></li>
                </ul>
            </nav>
        <?php } else if ($user->super_admin == 1) { ?>
        <nav>
            <ul>
                <li><a href="#">서점 관리</a></li>
            </ul>
            <ul>
                <li><a href="#">회원 관리</a></li>
            </ul>
            <ul>
                <li><a><?= $user->name ?>님</a></li>
            </ul>
            <ul>
                <li><a href="./logout.php">로그아웃</a></li>
            </ul>
        </nav>
        <?php } else { ?>
        <nav>
            <ul>
                <li><a href="#">서점 조회</a></li>
            </ul>
            <ul>
                <li><a href="#">마이 프로필</a></li>
            </ul>
            <ul>
                <li><a><?= $user->name ?>님</a></li>
            </ul>
            <ul>
                <li><a href="./logout.php">로그아웃</a></li>
            </ul>
        </nav>
        <?php } ?>
    </div>
</header>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>마이 프로필</title>
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>
  <?php
  require_once './header.php';
  $user = $_SESSION["ss"];
  ?>

  <main class="view-box">
    <header>
      <div>
        <h1>마이 프로필</h1>
        <p>내 정보를 확인하세요</p>
      </div>
    </header>
    <div class="profile">
      <header>
        <div>
          <h1><?=$user->name?>님</h1>
          <p>@<?=$user->id?></p>
          <p>가입 한 이메일: <?=$user->email?></p>
        </div>
        <div class="btns">
          <a href="#" class="btn">닉네임 변경</a>
          <a href="#" class="btn red-btn">회원 탈퇴</a>
        </div>
      </header>
      <div class="profile-content">
        <h3>대여한 책</h3>
        <table>
          <thead>
            <th>서점</th>
            <th>책 이름</th>
            <th>대여기간</th>
            <th>상태</th>
            <th>관리</th>
          </thead>
          <tbody>
            foreach($books as $book) {
              
            }
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>
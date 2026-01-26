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
  $books = db::fetchAll("select b.*, u.* from book b inner join user_book u on b.idx = u.book_idx and u.user_idx = '$user->idx'")
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
      </div>
      <div class="books">
        <?php foreach($books as $book) { ?>
        <div class="book">
           <?php if($book->period > 7) { ?>
          <span class="book-type red-btn btn">연체됨</span>
          <?php } else { ?>
          <span class="book-type white-btn btn">대여 중</span>
            <?php }?>
        <div class="book-img">
          <img src="<?=$book->img?>" alt="<?=$book->title?>">
        </div>
        <div class="book-content">
          <h3 class="book-title"><?=$book->title?></h3>
          <p class="book-des"><?=$book->des?></p>
          <p class="book-period">반납 기한: <?=$book->period?>일 남음</p>
        </div>
        <div class="book-btns">
          <a href="#" class="btn">반납</a>
        </div>
      </div>
      <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>
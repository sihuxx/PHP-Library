<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>책 대여 유저 조회</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <?php 
    require_once './header.php';
    $year = isset($_GET['year']) ? $_GET["year"] : date('Y');
    $month = isset($_GET['month']) ? $_GET["month"] : date('m');

    $date = "$year-$month-01";
    $time = strtotime($date);
    $start_week = date("w", $time);
    $total_day = date("t", $time);
    $total_week = ceil(($total_day + $start_week) / 7);  
    $users = db::fetchAll("select u.*, ub.*, u.idx as user_id from user u inner join user_book ub on u.idx = ub.user_idx where ub.rental_date like '$year-$month-%'");
  ?>
<div class="background">
    <div class="rental-user">
      <div class="btn red-btn close-btn">닫기</div>
  </div>
</div>
 <main class="view-box">
  <header>
    <div>
      <h1>책 대여 유저 조회 (캘린더)</h1>
      <p>캘린더로 책 대여 유저를 조회하세요</p>
    </div>
  </header>
  <div class="calender-control">
    <?php if ($month == 1) { ?>
    <a href="?year=<?=$year-1?>&month=12">&lt;</a>
    <?php } else { ?> 
    <a href="?year=<?=$year?>&month=<?=$month - 1?>">&lt;</a>
    <?php } ?>
    
    <?php echo "$year 년 $month 월" ?>
  <?php if ($month == 12) { ?>
    <a href="?year=<?=$year+1?>&month=1">&lt;</a>
  <?php } else { ?> 
    <a href="?year=<?=$year?>&month=<?=$month + 1?>">&gt;</a>
  <?php } ?>
</div>
  <table class="calender-table">
    <thead>
      <th>일</th>
      <th>월</th>
      <th>화</th>
      <th>수</th>
      <th>목</th>
      <th>금</th>
      <th>토</th>
    </thead>
    <tbody>
      <?php for($n = 1, $i = 0; $i < $total_week; $i++) { ?>
        <tr> 
        <?php for($k = 0; $k < 7; $k++) { ?>
          <td>
            <?php if(($n > 1 || $k >= $start_week) && ($total_day >= $n)) {
              echo $n++;
            } ?>
          </td>
        <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
 </main>
</body>
<script>
  const closeBtn = document.querySelector(".close-btn")
  const openBtn = document.querySelector(".open-btn")

  closeBtn.addEventListener("click", () => {
    closeBtn.closest(".background").style.display = 'none'
  })

  function openRental() {
   const td = document.querySelectorAll("table tbody td") 
   const year = <?= $year ?>
   const month = <?= $month ?>

   td.forEach(e => {
    e.addEventListener('click', (event) => {
      const day = event.target.textContent.trim()

      const targetDay = `${year}-${month}-${day}`
    })
   })
  }

  openRental();
</script>
</html>

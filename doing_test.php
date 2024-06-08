<?php
session_start();
require 'config/connect.php';
$macc = $_GET['macc'] ?? "";
$tencc = $_GET['tencc'] ?? "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />

  <!--=============== REMIXICONS ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="./css/main.css" />

  <title>CHỌN CHỨNG CHỈ</title>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="container nav">
      <a href="index.php" class="nav__logo">
        <img src="./images/logo.png" alt="" style="position: relative; top: 10px; left: 20px" />
        <i>English </i>
        <p>test</p>
      </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link active-link">Trang chủ</a>
          </li>
          <li class="nav__item">
            <a href="doing_test.html" class="nav__link">Chứng chỉ</a>
          </li>
          <li class="nav__item">
            <a href="doing_test.html" class="nav__link">Danh sách đề thi</a>
          </li>
        </ul>

        <!-- Button close -->
        <div class="nav__close" id="nav-close">
          <i class="ri-close-line"></i>
        </div>
      </div>

      <div class="nav__actions">
        <a href="trangCaNhan.php" style="text-decoration: none;color: black;"><i class="ri-user-line" style="font-size: 19px;"><?php echo $_SESSION['admin']['hoten'] ?></i></a>
        <a href="logout.php" style="color: red;"><i class="ri-logout-circle-r-line"></i></a>
        <!-- Toggle Button -->
        <div class="nav__toggle" id="nav-toggle">
          <i class="ri-menu-line"></i>
        </div>
      </div>
    </nav>
  </header>

  <!--==================== MAIN ====================-->
  <main class="main">
    <!--==================== HOME ====================-->
    <section class="menu_exam section" id="menu-exam">
      <div class="menu__exam container">
        <div style="height: 520px;">
          <?php
          $limit = 8;
          $sql = "SELECT * FROM `tbl_dethi` WHERE machungchi ='$macc'";
          $result = $pdo->query($sql);
          $total_records = $result->rowCount();
          $total_pages = ceil($total_records / $limit);
          $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
          if ($page < 1 || $page > $total_pages) {
            $page = 1;
          }
          $offset = ($page - 1) * $limit;
          $stm = $pdo->query("SELECT * FROM `tbl_dethi` WHERE machungchi ='$macc' LIMIT $limit OFFSET $offset");
          if ($stm->rowCount() > 0) {
            $row = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach ($row as $item) {
          ?>
              <div class="card-doing">
                <div class="card-doing-test">
                  <h1><?php echo $item->tendethi ?></h1>
                  <div style="margin-top: 10px;">
                    <svg width="20" height="20" fill="#080808" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M12 5.75a7.25 7.25 0 1 0 0 14.5 7.25 7.25 0 0 0 0-14.5ZM3.25 13a8.75 8.75 0 1 1 17.5 0 8.75 8.75 0 0 1-17.5 0Z" clip-rule="evenodd"></path>
                      <path fill-rule="evenodd" d="M12 7.25a.75.75 0 0 1 .75.75v4.584l2.648 1.655a.75.75 0 1 1-.796 1.272l-3-1.875A.75.75 0 0 1 11.25 13V8a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"></path>
                      <path fill-rule="evenodd" d="M6.53 3.47a.75.75 0 0 1 0 1.06l-2.5 2.5a.75.75 0 0 1-1.06-1.06l2.5-2.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
                      <path fill-rule="evenodd" d="M17.47 3.47a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd"></path>
                    </svg>
                    <label><?php echo $item->thoigianthi ?> phút</label>
                  </div>
                  <div>
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                      <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z" />
                    </svg>
                    <label style="font-size: 18px;position: relative;top:-4px"><?php echo $item->luotthi ?> lượt</label>
                  </div>
                  <div>
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                    </svg>
                    <?php
                    $stmCount = $pdo->query("SELECT * FROM tbl_ctdethi WHERE made = '$item->made'");
                    $count = $stmCount->rowCount();
                    ?>
                    <label style="font-size: 18px;position: relative;top:-2px"><?php echo $count ?> câu</label>
                  </div>
                  <div class="tab-tencc">
                    #<?php echo $tencc ?>
                  </div>
                  <a href="test_form.php?made=<?php echo $item->made ?>&timethi=<?php echo $item->thoigianthi ?>" class="btn-thi">Vào Thi</a>
                </div>
              </div>
            <?php
            }
            $page_number = $_GET['page'] ?? "";
            if ($page_number == "" || $page_number < $total_pages) {
              $number = 1;
            } else if ($page_number == 1) {
              $number = 2;
            } else {
              $number = $page_number;
            }
            $number_now = 2;
            ?>
            <section class="pagination" id="pagination-id">
              <div class="page_number">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="?macc=<?php echo $macc ?>&tencc=<?php echo $tencc ?>&page=<?php echo $number - 1 ?>">
                      < </a>
                  </li>
                  <?php
                  for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                      $number_now = $i;
                  ?>
                      <li class="page-item active">
                        <a class="page-link" href="?macc=<?php echo $macc ?>&tencc=<?php echo $tencc ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                      </li>
                    <?php
                    } else {
                    ?>
                      <li class="page-item"><a class="page-link" href="?macc=<?php echo $macc ?>&tencc=<?php echo $tencc ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                  <?php
                    }
                  }
                  if ($number_now == $total_pages) {
                    $number_now = 0;
                  }
                  ?>
                  <li class="page-item"><a class="page-link" href="?macc=<?php echo $macc ?>&tencc=<?php echo $tencc ?>&page=<?php echo $number_now + 1 ?>">></a></li>
                </ul>
              </div>
            </section>
          <?php
          }
          ?>
        </div>

      </div>
    </section>
  </main>

  <!--==================== FOOTER ====================-->
  <footer class="footer">
    <div class="footer__container container grid">
      <div>
        <a href="" class="footer__logo">
          <i class="ri-catus-line"></i>
        </a>

        <p class="footer__description">
          Choose the best <br />
          English Test for you.
        </p>
      </div>

      <div class="footer__content grid">
        <div>
          <h3 class="footer__title">COMPANY</h3>

          <ul class="footer__links">
            <li>
              <a href="" class="footer__link">About us</a>
            </li>
            <li>
              <a href="" class="footer__link">Products</a>
            </li>
            <li>
              <a href="" class="footer__link">Feature</a>
            </li>
            <li>
              <a href="" class="footer__link">Blog & News</a>
            </li>
          </ul>
        </div>

        <div>
          <h3 class="footer__title">COMPANY</h3>

          <ul class="footer__links">
            <li>
              <a href="" class="footer__link">About us</a>
            </li>
            <li>
              <a href="" class="footer__link">Products</a>
            </li>
            <li>
              <a href="" class="footer__link">Feature</a>
            </li>
            <li>
              <a href="" class="footer__link">Blog & News</a>
            </li>
          </ul>
        </div>

        <div>
          <h3 class="footer__title"></h3>

          <ul class="footer__social">
            <a href="" target="_blank" class="footer__social-link">
              <i class="ri-facebook-circle-fill"></i>
            </a>

            <a href="" target="_blank" class="footer__social-link">
              <i class="ri-instagram-fill"></i>
            </a>

            <a href="" target="_blank" class="footer__social-link">
              <i class="ri-twitter-x-line"></i>
            </a>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!--========== SCROLL UP ==========-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-line"></i>
  </a>

  <!--=============== SCROLLREVEAL ===============-->
  <script src=""></script>

  <!--=============== MAIN JS ===============-->
  <script src="../js/main.js"></script>
</body>

</html>
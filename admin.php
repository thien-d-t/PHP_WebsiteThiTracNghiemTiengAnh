<?php 
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['admin'])){
        header('location:login.php');exit;
    }
?>
<!-- <pre></pre>
<h1>Trang chủ <?php #echo $_SESSION['admin']['taikhoan']?></h1>
<h1><?php #echo $_SESSION['admin']['hoten']?></h1>
<h1>Trang chủ</h1>
<a href="">logount <?php #unset($_SESSION['admin']);?></a> -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ADMIN</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="admin.php" class="logo"> 
         <img src="images/logo.png" alt="" width="70px" height="50px" >
         <p style="position: absolute;left: 90px;top:15px; font-style: italic;">English</p>
         <p style="position: absolute;left: 75px;top:35px; font-style: italic;">Test</p>
      </a>

      <!-- <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form> -->

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $_SESSION['admin']['hoten']?></h3>
         <p class="role">Admin</p>
         <a href="profile.html" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <button type="button" id="dialog" href="logout.php" class="option-btn">Logout</button>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt="">
      <h3 class="name"><?php echo $_SESSION['admin']['hoten']?></h3>
      <p class="role">Admin</p>
      <a href="profile.html" class="btn">Hồ sơ</a>
   </div>

   <nav class="navbar">
      <a href="admin.php"><i class="fas fa-home"></i><span>Trang chủ</span></a>
      <a href="DS_taikhoan.php"><i class="fa-solid fa-user"></i><span>Tài khoản</span></a>
      <a href="DS_cauhoi.php"><i class="fa-solid fa-question"></i><span>Câu hỏi</span></a>
      <a href="DS_dethi.php"><i class="fas fa-chalkboard-user"></i><span>Đề thi</span></a>
      <a href="about.html"><i class="fa-solid fa-chart-simple"></i><span>Thống kê</span></a>
   </nav>

</div>

<section class="home-grid">

   <h1 class="heading">quản lý</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">quản lý đề thi</h3>
         <a href="DS_dethi.php" class="inline-btn" style="width: 240px;">danh sách đề thi</a>
      </div>
      <div class="box">
         <h3 class="title">quản lý bài thi</h3>
         <a href="DS_cauhoi.php" class="inline-btn" style="width: 240px;">danh sách câu hỏi</a>
      </div>
      <div class="box">
         <h3 class="title">quản lý đáp án</h3>
         <a href="DS_dapan.php" class="inline-btn" style="width: 240px;">danh sách đáp án</a>
      </div>

      <div class="box">
         <h3 class="title">quản lý tài khoản</h3>
         <a href="DS_taikhoan.php" class="inline-btn" style="width: 240px; ">danh sách tài khoản</a>
      </div>

      <div class="box">
         <h3 class="title">quản lý chứng chỉ</h3>
         <a href="DS_chungchi.php" class="inline-btn" style="width: 240px; ">danh sách chứng chỉ</a>
      </div>

      <!-- <div class="box">
         <h3 class="title">thống kê</h3>
         <a href="#" class="inline-btn" style="width: 240px;">thống kê điểm</a>
         <a href="#" class="inline-btn" style="width: 240px;">thống kê bài thi</a>
      </div> -->

   </div>

</section>


<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>
<script>
   document.getElementById("dialog").addEventListener('click',function(){
      Swal.fire({
      title: "Are you sure?",
      text: "Do you really want to log out??",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, logout now!"
      }).then((result) => {
      if (result.isConfirmed) {
         location.href ="logout.php";
      }
      });
   });
</script>
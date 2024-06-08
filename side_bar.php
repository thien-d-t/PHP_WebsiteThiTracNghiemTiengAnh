<?php 
include 'essentials.php';
?>
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
   
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style_custom.css">

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
         <h3 class="name">Name Admin</h3>
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
      <h3 class="name">Name Admin</h3>
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



<!-- custom js file link  -->
<script src="js/script.js"></script>
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

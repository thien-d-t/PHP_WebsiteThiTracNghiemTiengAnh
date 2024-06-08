<?php
require('func.php');
if(!isset($_SESSION)) session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <title>LOGIN</title>

    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <h1 style="font-size: 50px;">
      <img src="images/logo.png" alt="" width="100px" height="70px" style="left: 17px;position: relative;top: -10px;">
      <i>english test</i>
    </h1>    
    <br>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="login.php" name="signUp" onsubmit="return validateForm_register()" method="get">
          <h1 style="font-size: 28px;">Create Account</h1>
          <div class="social-container">
            <a href="#" class="social"><svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.2 2.875A4.625 4.625 0 0 0 9.575 7.5v2.575H7.1c-.124 0-.225.1-.225.225v3.4c0 .124.1.225.225.225h2.475V20.9c0 .124.1.225.225.225h3.4c.124 0 .225-.1.225-.225v-6.975h2.497c.103 0 .193-.07.218-.17l.85-3.4a.225.225 0 0 0-.218-.28h-3.347V7.5a.775.775 0 0 1 .775-.775h2.6c.124 0 .225-.1.225-.225V3.1c0-.124-.1-.225-.225-.225h-2.6Z"></path>
            </svg></i></a>
            <a href="#" class="social"><svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.66 10.2c.096 0 .179.067.195.161.094.526.145 1.092.145 1.639a8.967 8.967 0 0 1-2.293 6.001.197.197 0 0 1-.274.018l-2.445-2.07a.206.206 0 0 1-.016-.297 5.398 5.398 0 0 0 1.114-1.852H12.2a.2.2 0 0 1-.2-.2v-3.2c0-.11.09-.2.2-.2h8.46Z"></path>
              <path d="M14.473 16.8a.205.205 0 0 1 .226.024l2.568 2.173a.196.196 0 0 1-.01.309A8.959 8.959 0 0 1 12 21a8.993 8.993 0 0 1-7.548-4.097.197.197 0 0 1 .046-.263l2.545-1.962a.207.207 0 0 1 .303.062 5.398 5.398 0 0 0 7.127 2.06Z"></path>
              <path d="M6.68 12.926a.205.205 0 0 1-.076.197L3.869 15.23a.196.196 0 0 1-.304-.084A8.98 8.98 0 0 1 3 12c0-1.152.217-2.254.612-3.267a.196.196 0 0 1 .299-.085l2.732 2.004c.065.047.095.13.078.208a5.419 5.419 0 0 0-.042 2.066Z"></path>
              <path d="M7.147 9.161c.096.07.231.042.295-.058A5.396 5.396 0 0 1 12 6.6a5.37 5.37 0 0 1 3.44 1.245.205.205 0 0 0 .276-.01l2.266-2.267a.197.197 0 0 0-.007-.286A8.953 8.953 0 0 0 12 3a8.992 8.992 0 0 0-7.484 4 .197.197 0 0 0 .049.267l2.582 1.894Z"></path>
            </svg></a>
            <a href="#" class="social"><svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 1.25a2.75 2.75 0 1 0 0 5.5 2.75 2.75 0 0 0 0-5.5ZM3.75 4a1.25 1.25 0 1 1 2.5 0 1.25 1.25 0 0 1-2.5 0Z" clip-rule="evenodd"></path>
              <path fill-rule="evenodd" d="M2.25 8A.75.75 0 0 1 3 7.25h4a.75.75 0 0 1 .75.75v13a.75.75 0 0 1-.75.75H3a.75.75 0 0 1-.75-.75V8Zm1.5.75v11.5h2.5V8.75h-2.5Z" clip-rule="evenodd"></path>
              <path fill-rule="evenodd" d="M9.25 8a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 .75.75v.434l.435-.187a7.792 7.792 0 0 1 2.358-.595C20.318 7.4 22.75 9.58 22.75 12.38V21a.75.75 0 0 1-.75.75h-4a.75.75 0 0 1-.75-.75v-7a1.25 1.25 0 0 0-2.5 0v7a.75.75 0 0 1-.75.75h-4a.75.75 0 0 1-.75-.75V8Zm1.5.75v11.5h2.5V14a2.75 2.75 0 1 1 5.5 0v6.25h2.5v-7.87c0-1.904-1.661-3.408-3.57-3.234a6.31 6.31 0 0 0-1.904.48l-1.48.635a.75.75 0 0 1-1.046-.69V8.75h-2.5Z" clip-rule="evenodd"></path>
             </svg></a>
          </div>  
          <span>or use your email for registration</span>
          <input type="text" placeholder="Name" name="name"/>
          <input type="email" placeholder="Email" name="email"/>
          <input type="user" placeholder="User" name="user"/>
          <input type="password" placeholder="Password" name="password"/>
          <input type="submit" value="Sign Up" name="signUp" style="border-radius: 20px;border: 1px solid #ff4b2b;background-color: #ff4b2b;color: #ffffff;font-size: 12px;font-weight: bold;  padding: 12px 45px;  letter-spacing: 1px;  text-transform: uppercase;  transition: transform 80ms ease-in;width: 150px;">
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="login.php" name="signIn" onsubmit="return validateForm_signIn()" method="get">
          <h1>Sign in</h1>
          <div class="social-container">
            <a href="#" class="social"><svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.2 2.875A4.625 4.625 0 0 0 9.575 7.5v2.575H7.1c-.124 0-.225.1-.225.225v3.4c0 .124.1.225.225.225h2.475V20.9c0 .124.1.225.225.225h3.4c.124 0 .225-.1.225-.225v-6.975h2.497c.103 0 .193-.07.218-.17l.85-3.4a.225.225 0 0 0-.218-.28h-3.347V7.5a.775.775 0 0 1 .775-.775h2.6c.124 0 .225-.1.225-.225V3.1c0-.124-.1-.225-.225-.225h-2.6Z"></path>
            </svg></i></a>
            <a href="#" class="social"><svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.66 10.2c.096 0 .179.067.195.161.094.526.145 1.092.145 1.639a8.967 8.967 0 0 1-2.293 6.001.197.197 0 0 1-.274.018l-2.445-2.07a.206.206 0 0 1-.016-.297 5.398 5.398 0 0 0 1.114-1.852H12.2a.2.2 0 0 1-.2-.2v-3.2c0-.11.09-.2.2-.2h8.46Z"></path>
              <path d="M14.473 16.8a.205.205 0 0 1 .226.024l2.568 2.173a.196.196 0 0 1-.01.309A8.959 8.959 0 0 1 12 21a8.993 8.993 0 0 1-7.548-4.097.197.197 0 0 1 .046-.263l2.545-1.962a.207.207 0 0 1 .303.062 5.398 5.398 0 0 0 7.127 2.06Z"></path>
              <path d="M6.68 12.926a.205.205 0 0 1-.076.197L3.869 15.23a.196.196 0 0 1-.304-.084A8.98 8.98 0 0 1 3 12c0-1.152.217-2.254.612-3.267a.196.196 0 0 1 .299-.085l2.732 2.004c.065.047.095.13.078.208a5.419 5.419 0 0 0-.042 2.066Z"></path>
              <path d="M7.147 9.161c.096.07.231.042.295-.058A5.396 5.396 0 0 1 12 6.6a5.37 5.37 0 0 1 3.44 1.245.205.205 0 0 0 .276-.01l2.266-2.267a.197.197 0 0 0-.007-.286A8.953 8.953 0 0 0 12 3a8.992 8.992 0 0 0-7.484 4 .197.197 0 0 0 .049.267l2.582 1.894Z"></path>
            </svg></a>
            <a href="#" class="social"><svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 1.25a2.75 2.75 0 1 0 0 5.5 2.75 2.75 0 0 0 0-5.5ZM3.75 4a1.25 1.25 0 1 1 2.5 0 1.25 1.25 0 0 1-2.5 0Z" clip-rule="evenodd"></path>
              <path fill-rule="evenodd" d="M2.25 8A.75.75 0 0 1 3 7.25h4a.75.75 0 0 1 .75.75v13a.75.75 0 0 1-.75.75H3a.75.75 0 0 1-.75-.75V8Zm1.5.75v11.5h2.5V8.75h-2.5Z" clip-rule="evenodd"></path>
              <path fill-rule="evenodd" d="M9.25 8a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 .75.75v.434l.435-.187a7.792 7.792 0 0 1 2.358-.595C20.318 7.4 22.75 9.58 22.75 12.38V21a.75.75 0 0 1-.75.75h-4a.75.75 0 0 1-.75-.75v-7a1.25 1.25 0 0 0-2.5 0v7a.75.75 0 0 1-.75.75h-4a.75.75 0 0 1-.75-.75V8Zm1.5.75v11.5h2.5V14a2.75 2.75 0 1 1 5.5 0v6.25h2.5v-7.87c0-1.904-1.661-3.408-3.57-3.234a6.31 6.31 0 0 0-1.904.48l-1.48.635a.75.75 0 0 1-1.046-.69V8.75h-2.5Z" clip-rule="evenodd"></path>
             </svg></a>
          </div>
          <span>or use your account</span>
          <input type="text" placeholder="User" name="user"/>
          <input type="password" placeholder="Password"  name="password"/>
          <a href="form_quenPassword.php" id="dialog">Forgot your password?</a>
          <input type="submit" value="Sign In" name="signIn" style="border-radius: 20px;border: 1px solid #ff4b2b;background-color: #ff4b2b;color: #ffffff;font-size: 12px;font-weight: bold;  padding: 12px 45px;  letter-spacing: 1px;  text-transform: uppercase;  transition: transform 80ms ease-in;width: 150px;">
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <?php 
      if (!isset($_GET['signIn']) || $_GET['signIn']=="") {
        
      }else{
        require('config/connect.php');
        $user = isset($_REQUEST['user'])?$_REQUEST['user']:null;
        $pws= isset($_REQUEST['password'])?$_REQUEST['password']:null;  
        $stm = $pdo->query("select * from tbl_nguoidung where taikhoan = '$user' and matkhau='$pws'");
        if($stm->rowCount()>0){
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            $_SESSION['admin']=$data;
            if($data['manhomquyen'] == 1 ){
              ?>
              <script>
                location.href = 'admin.php';
              </script>
            <?php
            }else{
              ?>
              <script>
                location.href = 'index.php';
              </script>
            <?php
            }
            
            
        }else{
            alert('error', 'Đăng nhập không thành công - Thông tin xác thực không hợp lệ!');
        }
      }
    ?>
    <?php 
      if (!isset($_GET['signUp']) || $_GET['signUp']=="") {

      }else{
        require('config/connect.php');
        $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
        $name = isset($_REQUEST['name'])?$_REQUEST['name']:null;
        $taikhoan = isset($_REQUEST['user'])?$_REQUEST['user']:null;
        $psw = isset($_REQUEST['password'])?$_REQUEST['password']:null;
        $stm = $pdo->query("select * from tbl_nguoidung where email = '$email'");
        $n = $stm->rowCount();

        if($stm->rowCount()>0){
            alert('error','Email đã được đăng ký');
            ?>
            <script>
              container.classList.add("right-panel-active");
            </script>
            <?php
        }else{
          $sql = 'INSERT INTO `tbl_nguoidung`(`hoten`,`email`, `taikhoan`, `matkhau`, `manhomquyen`)
           VALUES (?,?,?,?,2)';
          $arr = [$name,$email,$taikhoan,$psw];
          $stm1 = $pdo->prepare($sql);
          $stm1->execute($arr);

          $row = $stm1->fetch(PDO::FETCH_ASSOC);
          $_SESSION['admin']=$row;
          alert('success','Đăng ký thành công!!');
          ?>
          <script>
            container.classList.remove("right-panel-active");
          </script>
          <?php
        }
      }
    ?>
  </body>
  <script src="js/login.js"></script>
  <script>
    function validateForm_signIn(){
      var fuser = document.forms["signIn"]["user"].value;
      var fpassword = document.forms["signIn"]["password"].value;

      if (fuser == null || fuser == "") {
          alert("Tài khoản không được bỏ trống");
          return false;
      } else if (fpassword == null || fpassword == "") {
          alert("Mật khẩu không được bỏ trống");
          return false;
      }
    }

    function validateForm_register(){
      var fuser = document.forms["register"]["user"].value;
      var fpassword = document.forms["register"]["password"].value;
      var fname = document.forms["register"]["name"].value;
      var femail = document.forms["register"]["email"].value;

      if (fname == null || fname == "") {
          alert("Tên người dùng không được bỏ trống");
          return false;
      } else if (femail == null || femail == "") {
          alert("Email không được bỏ trống");
          return false;
      } else if (fuser == null || fuser == "") {
          alert("Tài khoản không được bỏ trống","Thông báo");
          return false;
      } else if (fpassword == null || fpassword == "") {
          alert("Mật khẩu không được bỏ trống");
          return false;
      } 
    }
  </script>
  <script>
  document.getElementById("dialog").addEventListener('click', function(){
    Swal.fire("SweetAlert2 is working!");
  })
</script>
</html>

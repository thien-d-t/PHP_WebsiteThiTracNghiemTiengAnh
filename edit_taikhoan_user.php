<?php
require 'config/connect.php';
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
    exit;
}

$id_nguoidung = $_SESSION['admin']['id_nguoidung'];

$sql = "SELECT *
            FROM tbl_nguoidung
            WHERE id_nguoidung='$id_nguoidung'";
$stm = $pdo->query($sql);
$row = $stm->fetch(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/history.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .form-edit {
            width: 60%;
            height: 440px;
            margin: 20px auto 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 30%;
            text-align: right;
            margin-right: 20px;
            font-size: 20px;
        }

        .form-group input {
            width: 60%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 20px;
        }

        .form-group button {
            width: 20%;
            padding: 10px;
            border: none;
            background-color: #008bf8;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20%;
            align-items: center;
            margin-left: 270px;
        }

        .form-group button:hover {
            background-color: #006bbf;
        }

        .form-group .btn_cancel {
            border: 1px solid grey;
            background-color: grey;
            width: 70px;
            height: 40px;
            text-align: center;
            padding: 10px;
            font-size: 15px;
            color: #ffffff;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 40%;
        }

        .form-group .btn_cancel:hover {
            background-color: red;
        }
    </style>
</head>

<body>

    <header class="header">

        <section class="flex">

            <a href="admin.php" class="logo">
                <img src="images/logo.png" alt="" width="70px" height="50px">
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
                <h3 class="name"><?php echo $_SESSION['admin']['hoten'] ?></h3>
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
            <h3 class="name"><?php echo $_SESSION['admin']['hoten'] ?></h3>
            <a href="profile.html" class="btn">Hồ sơ</a>
        </div>

        <nav class="navbar">
            <a href="index.php"><i class="fas fa-home"></i><span>Trang chủ</span></a>
            <a href="edit_taikhoan_user.php"><i class="fa-solid fa-user"></i><span>Tài khoản</span></a>
        </nav>

    </div>

    <section class="home-grid">
        <div>
            <h1 style="text-align: center; color: red; font-size: 27px; font-weight: bold; margin-top: 3rem;">THÔNG TIN TÀI KHOẢN</h1>
            <div class="form-edit">
                <form action="update_taikhoan_user.php" method="post" name="edit-form" onsubmit="return validateForm_edit()" enctype="multipart/form-data">
                    <input type="hidden" name="id_nguoidung" value="<?php echo htmlspecialchars($row->id_nguoidung); ?>">
                    <div class="form-group" style="margin-top: 10px;">
                        <label for="name">Họ và Tên:</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($row->hoten); ?>">
                    </div>
                    <div class="form-group">
                        <label for="bod">Ngày sinh:</label>
                        <input type="text" name="bod" value="<?php echo htmlspecialchars($row->ngaysinh); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo htmlspecialchars($row->email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Tài Khoản:</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($row->taikhoan); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="text" name="password" value="<?php echo htmlspecialchars($row->matkhau); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- custom js file link  -->
    <script src="js/script.js"></script>


</body>

</html>
<script>
    document.getElementById("dialog").addEventListener('click', function() {
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
                location.href = "logout.php";
            }
        });
    });
</script>
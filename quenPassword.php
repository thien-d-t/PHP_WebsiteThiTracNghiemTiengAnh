<head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<?php
session_start();
require './config/connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$User = $_POST['user']??"";
echo"$User";
$stm = $pdo->query("SELECT * FROM tbl_nguoidung WHERE taikhoan = '$User'");
    $row = $stm->fetch(PDO::FETCH_OBJ);
    if($row == true){
        $mailNameUser = $row->hoten;
        $mailUser = $row->email;
        $password = $row->matkhau;
    }else{
        echo"lõi";  
    }

require('./mail/PHPMailer-master/src/Exception.php');
require('./mail/PHPMailer-master/src/SMTP.php');
require('./mail/PHPMailer-master/src/PHPMailer.php');

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP(); // Sử dụng SMTP để gửi mail
    $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
    $mail->SMTPAuth = true; // Bật xác thực SMTP
    $mail->Username = 'quanlykhachsan09@gmail.com'; // Tài khoản email
    $mail->Password = 'wjpwtjvuymlidctx'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
    $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
    $mail->Port = 465; // Cổng kết nối SMTP là 465

    //Recipients
    $mail->setFrom('quanlykhachsan09@gmail.com', 'English Test'); // Địa chỉ email và tên người gửi
    $mail->addAddress("$mailUser", "$mailNameUser"); // Địa chỉ mail và tên người nhận

    //Content
    $mail->isHTML(true); // Set email format to HTML
    //$mail->Subject = 'Xác nhận đơn đặt phòng'; 
    $subject = 'Thông báo lấy lại mật khẩu';
    $sub = '=?UTF-8?B?'.base64_encode($subject).'?=';
    $mail->Subject = $sub;// Tiêu đề
    $mail->Body = "
        Kính gửi <b>$mailNameUser</b>,<br>
        Mật khẩu của bạn là: <b>$password</b><br>
        Vui lòng không tiết lộ mật khẩu cho người khác.<br>
        Trân trọng, <b>$mailNameUser</b>.
    "; // Nội dung

    $mail->send();
    
    header("Location: login.php");
    exit;
    } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;}
?>
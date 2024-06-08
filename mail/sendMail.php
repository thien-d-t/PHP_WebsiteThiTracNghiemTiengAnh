
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

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
$mail->setFrom('quanlykhachsan09@gmail.com', 'Hotel TVT'); // Địa chỉ email và tên người gửi
$mail->addAddress('daoquocthai09@gmail.com', 'Đào Quốc Thái'); // Địa chỉ mail và tên người nhận

//Content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'Xác nhận đơn đặt phòng'; // Tiêu đề
$mail->Body = 'Khách hàng: '+ $tenKH; // Nội dung

$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;}
?>
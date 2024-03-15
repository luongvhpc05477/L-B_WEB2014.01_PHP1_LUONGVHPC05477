<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';


function thanhToanVaGuiEmail($emailNguoiNhan, $tieuDe, $noiDung) {
    $mail = new PHPMailer(true);

    try {
        // Cấu hình thông tin máy chủ email và tài khoản gửi
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Thay đổi nếu bạn sử dụng máy chủ email khác
        $mail->SMTPAuth = true;
        $mail->Username = 'luongvhpc05477@fpt.edu.vn'; // Thay đổi bằng địa chỉ email của bạn
        $mail->Password = 'ixethmiyvmemfzsn';  // Thay đổi bằng mật khẩu của bạn
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;  // Thay đổi nếu máy chủ email của bạn yêu cầu cổng khác

        // Thiết lập người gửi và người nhận
        $mail->setFrom('luongvhpc05477@fpt.edu.vn', 'ShopSneaker');  // Thay đổi bằng địa chỉ email và tên của bạn
        $mail->addAddress($emailNguoiNhan);  // Sử dụng địa chỉ email người nhận được truyền vào hàm
        $mail->isHTML(true);

        // Đặt tiêu đề và nội dung của email
        $mail->Subject = $tieuDe;
        $mail->Body = $noiDung;

        // Gửi email
        $mail->send();
        // echo "Thành công";
        return true;

    } catch (Exception $e) {
        echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
        return false;
    }
}


function sendMail(){
    $mail = new PHPMailer(true);

try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'luongvhpc05477@fpt.edu.vn';                     //SMTP username
    // $mail->Password   = 'i x e t h m i y v m e m f z s n';                               //SMTP password
    // $mail->SMTPSecure = 'ssl';                              //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '429aed81ae2429';
    $mail->Password = '4a2e20bc5b46f6';




    //Recipients
    $mail->setFrom('luongvhpc05477@fpt.edu.vn', 'Mailer');
    $mail->addAddress('luongvhpc05477@fpt.edu.vn', 'Joe User');     
    $mail->addAddress('luongvhpc05477@fpt.edu.vn');              
    $mail->addReplyTo('luongvhpc05477@fpt.edu.vn', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
  //Optional name

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    // code chức năng ghi log vào đây
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
// sendMail();

?>
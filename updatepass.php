<?php
// Nhập giá trị number bằng phương thức post
include_once("inc_db.php");
include "phpmailer/src/PHPMailer.php";
include "phpmailer/src/Exception.php";
include "phpmailer/src/OAuth.php";
include "phpmailer/src/POP3.php";
include "phpmailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = isset($_POST['email']) ? $_POST['email'] : false;
$newpass = isset($_POST['newpass']) ? $_POST['newpass'] : false;
$md5 = md5($newpass);
$sql = "UPDATE student SET password = '$md5' WHERE email = '$email'";
if ($cn->query($sql) === TRUE){

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hoxuanhunghust@gmail.com';                 // SMTP username
    $mail->Password = 'muamaytinh';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('hoxuanhunghust@gmail.com', 'Ký túc xá Đại học Bách khoa Hà Nội');
    $mail->addAddress($email,'Sinh viên');     // Add a recipient
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('hoxuanhunghust@gmail.com', 'CSAM - Hệ sinh thái lưu trú trực tuyến');
    $mail->addCC('hoxuanhunghust@gmail.com');
    $mail->addBCC('hoxuanhunghust@gmail.com');
 
    //Attachments
    $mail->addAttachment('ktx.jpg');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '[Ký túc xá Bách khoa] Mật khẩu mới';
    $body='
    <h3> Mật khẩu mới của bạn là: <h2>'.$newpass.'</h2>
     </h3>
     
    ';
    $mail->Body = $body;
    $mail->AltBody = 'Ký túc xá Đại học Bách khoa Hà Nội';
 
    $mail->send();
    }

?>

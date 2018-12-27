<?php

function rand_string( $length ) {
//$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$str="";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}
// 3. Sinh ngau nhien du lieu
include_once("inc_db.php");

include "phpmailer/src/PHPMailer.php";
include "phpmailer/src/Exception.php";
include "phpmailer/src/OAuth.php";
include "phpmailer/src/POP3.php";
include "phpmailer/src/SMTP.php";

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = isset($_POST['email']) ? $_POST['email'] : false;

$code = rand_string(6);
$newpass = rand_string(7);

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
    $mail->Subject = '[Ký túc xá Bách khoa] Yêu lấy lại mật khẩu';
    $body='
    <h3> Chúng tôi nhận được thông tin Email này đã được sử dụng để lấy lại tài khoản Ký túc xá
    Trường Đại học Bách khoa Hà Nội tại ktx.hust.edu.vn, mã bảo mật của bạn là: <h2>'.$code.'</h2>
     </h3>
     <hr>
     <h4>Nếu không phải là bạn vui lòng bỏ qua Email này!</h4>
    ';
    $mail->Body = $body;
    $mail->AltBody = 'Ký túc xá Đại học Bách khoa Hà Nội';
 
    if($mail->send()){ 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="https://www.hust.edu.vn/documents/21257/147855/BVP-logo+bk-rgb.jpg/c2f94a78-f713-4af1-b9f0-7f6c4cb94438?version=1.0&t=1483699000000&imagePreview=1" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ký túc xá Đại học Bách khoa Hà Nội</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS được tối ưu và biên dịch mới nhất -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- Thư viện jQuery (dammio.com) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- JavaScript biên dịch mới nhất -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
    <br><br><br>
    <form onSubmit="return check(this)" method="post" action="success2.php">
   
<div class="form-row">
    <div class="form-group col-sm-12">
            <h2>Một mã kích hoạt đã được gửi vào email của bạn, vui lòng kiểm tra hộp thư đến để nhận!</h2>
            <input type="text" class="form-control" id="activeCode" name="activeCode" placeholder="Mã kích hoạt" required="true">
    </div>
</div>
 <div class="form-row">
        <div class="form-group col-sm-5 ">
            <label></label>
        </div>
        <div class="form-group col-sm-3 ">
            <input type="submit" name="add" value="Gửi mật khẩu mới về email" class="btn btn-primary"/>
        </div>        
    </div>
</div>
<script scr="pass.js"> <?php include "pass.js"?> </script>
        </form>
   </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
else {
    echo "<h1>Có lỗi xảy ra, vui lòng liên hệ Trung tâm quản lý KTX</h1>";
}

?>
 
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

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- JavaScript biên dịch mới nhất -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
</head>
<body>
<br>
<form onSubmit="return load_ajax(this)" method="post" action="sendmail.php">
<div class="container">
	<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>Chào mừng bạn đến với Trang đăng ký tài khoản Ký túc xá Đại học Bách khoa Hà Nội
    	Vui lòng điền đầy đủ và CHÍNH XÁC thông tin cá nhân!
    </p>
    <hr>
    <p class="mb-0">Mọi thắc mắc liên hệ https://www.facebook.com/kytucxabkhn/.</p>
	</div>
	<hr width="80%">

<br>

    <h4 class="mb-2">Đăng ký mở tài khoản</h4>
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label>Họ và tên:</label>
            <input type="text" class="form-control" name="name" 
                   id="name" placeholder="Hoàng Thị Thu Uyên" value="" required="true">
        </div>
        <div class="form-group col-sm-6">
            <label>MSSV:</label>
            <input type="text" class="form-control" name="code" 
                   id="code" value="" placeholder="20171234" required="true">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-12">
            <label>Email</label>
            <input type="email" class="form-control" name="email"
                   id="email" value="" required="true" placeholder="uyenhoang1234@gmail.com">
        </div>
    </div>
     <div class="form-row">
        <div class="form-group col-sm-6">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" 
                   id="password" value="" required="true">
        </div>
        <div class="form-group col-sm-6">
            <label>Nhập lại Password</label>
            <input type="password" class="form-control"
                   id="password2" name="password2" value="" placeholder="Nhập lại mật khẩu" required="true">
        </div>
    </div>
    <br>
    <br>
    <div class="form-row">
    	<div class="form-group col-sm-5 ">
    		<label></label>
    	</div>
        <div class="form-group col-sm-3 ">
            <input type="submit" name="add" value="Submit" class="btn btn-success"/>
        </div>        
	</div>
			<script scr="first.js"> <?php include "first.js"?></script>
</div>
</form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>File chính</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS được tối ưu và biên dịch mới nhất -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- Thư viện jQuery (dammio.com) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- JavaScript biên dịch mới nhất -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script>
        $(function () {
            $(".myPopover").popover();
        });
    </script>
    <style>.carousel-indicators li {
            width: 20px;
            height: 20px;
            border-radius: 100%;
        }</style>


</head>
<body>


<br>
<div class="container">
	<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>Aww yeah, Chào mừng bạn đến với trang html đầu tiên của Xuan Hung Ho. Đây là thông báo thử nghiệm.
        Chào mừng bạn đến với trang html đầu tiên của Xuan Hung Ho. Đây là thông báo thử nghiệm.
        Chào mừng bạn đến với trang html đầu tiên của Xuan Hung Ho. Đây là thông báo thử nghiệm
    </p>
    <hr>
    <p class="mb-0">Whenever you need to,
        be sure to use margin utilities to keep things nice and tidy.</p>
	</div>
	<hr width="80%">

<br>
    <h4 class="mb-2">Form đăng ký</h4>
    <div class="form-row">
        <div class="form-group col-sm-5">
            <label for="myEmail">Email</label>
            <input type="email" class="form-control" name="myEmail"
                   id="myEmail" value="">
            <div id="email" style="color: red; font-size: 20px;"></div>
        </div>
        <div class="form-group col-sm-5">
            <label for="myPassword">Password</label>
            <input type="password" class="form-control"
                   id="password" name="" value="123456789">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-4">
            <label for="username">Họ và tên:</label>
            <input type="text" class="form-control"
                   id="username" value="Hồ Xuân Hùng">
            <div id="usernameerr" style="color: red; font-size: 20px;"></div>
        </div>
        <div class="form-group col-sm-4">
            <label for="myCode">MSSV:</label>
            <input type="text" class="form-control"
                   id="myCode" value="20161935">
        </div>
    </div>
    <div class="form-group">
        <label for="myAddress2">Lớp:</label>
        <input type="text" class="form-control"
               id="myAddress2" value="CNTT2.01">
    </div>
    <div class="form-row">
        <div class="form-group col-sm-4">
            <label for="myState">Khoá:</label>
            <select id="myState" class="form-control">
                <option selected>K63</option>
                <option>K62</option>
                <option>K61</option>
                <option>K60</option>
                <option>K59</option>
                <option>K58</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-5">
            <h4>Nhập mã khoá học: </h4>
            <input type="text" class="form-control" value="" id="number" onkeyup="tinh_tien()">
        </div>
        <div class="form-group col-sm-3">
            <h4>Thành tiền: </h4>
            <input type="text" class="form-control" id="result" value="" style="color: darkviolet"/>
            <div id="resultnot" style="color: red; font-size: 20px;"></div>

        </div>
    </div>
    <script language="javascript">
        function tinh_tien() {
            var number = document.getElementById("number");
            var result = document.getElementById("result");
            num = parseInt(number.value);
            var java = 4000000;
            var android = 3000000;
            var c = 2000000;

            if (num == 1) {
                result.value = java;

            } else if (num == 2) {
                result.value = android;

            } else if (num == 3) {
                result.value = c;
            } else if ((num > 3) || (num < 1)) {
                result.value = "Sai mã khoá học";
            } else {
                result.value = "Nhập mã khoá học";
            }
        }
    </script>
        <h4>Hoặc chọn khoá học:</h4>
        <div class="form-row">
            <div class="form-group col-sm-5">
                <div class="checkbox">
                    <label><input id="c1" class="checkbox" name="cb" type="checkbox" onclick="e()"> Java (Mã khoá học: 1)</label>
                </div>
                <div class="checkbox">
                    <label><input id="c2" class="checkbox" name="cb" type="checkbox" onclick="e()"> Android (Mã khoá học: 2)</label>
                </div>
                <div class="checkbox">
                    <label><input id="c3" class="checkbox" name="cb" type="checkbox" onclick="e()"> C++ (Mã khoá học: 3)</label>
                </div>
            </div>
            <div class="form-group col-sm-3">
<!--                <h4>Thành tiền: </h4>-->
<!--                <input type="text" class="form-control" id="result" value=""/>-->
            </div>
        </div>

    <script language="javascript">
        function e() {
            var num = 0;
            var result = document.getElementById("result");
            if (document.getElementById("c1").checked == true) num += 400000;
            if (document.getElementById("c2").checked == true) num += 300000;
            if (document.getElementById("c3").checked == true) num += 200000;

            result.value = num;
        };
    </script>

    <h5>
        <div id="themdb" style="color: forestgreen"></div>
    </h5>
    <br><br>
    <div class="form-row">
        <div class="form-group col-sm-5 ">
            <input
            <button class="btn btn-outline-success myPopover" type="submit" data-toggle="popover"
                    title="Xác nhận"
                    data-content="Tính tiền khoá học và thêm thông tin vừa nhập vào Database"
                    onclick="load_ajax()"
                    value="Xác nhận" id="submit"
            </button>

            <script language="javascript">
                function load_ajax() {

                    var myEmail = $('#myEmail').val();
                    var number = $('#number').val();
                    var password = $('#password').val();
                    var username = $('#username').val();
                    var myCode = $('#myCode').val();
                    var myAddress2 = $('#myAddress2').val();
                    var myState = $('#myState').val();
                    var result = $('#result').val();

                    if (myEmail == "") {
                        $("#email").html("Email không được để trống");
                        return false;
                    }

                    if (username == "") {
                        $("#usernameerr").html("Họ tên không được để trống");
                        return false;
                    }

                    if ((result != '400000') && (result != '300000') && (result != '200000')) {
                        $("#resultnot").html("Vui lòng chọn lại mã khoá học");
                        return false;
                    }
                    $.ajax({
                        url: "result.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            myEmail: myEmail,
                            number: number,
                            password: password,
                            username: username,
                            myCode: myCode,
                            myAddress2: myAddress2,
                            myState: myState
                        },
                        success: function (respon) {
                            $("#themdb").html(respon);
                        }
                    });
                }
            </script>
        </div>
        <div class="form-group col-sm-3">
            <input
            <button class="btn btn-outline-danger" data-toggle="tooltip"
                    title="Xoá tài khoản của email vừa nhập trên" type="submit" onclick="del_ajax()"
                    value="Xoá DB của Email trên"
            </button>
            <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>
            <script language="javascript">
                function del_ajax() {
                    var myEmail = $('#myEmail').val();
                    $.ajax({
                        url: "delete.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            myEmail: myEmail
                        },
                        success: function (result) {
                            $('#table').html(result);
                        }
                    });
                }
            </script>
        </div>
    </div>

    <div id="table">
        <?php
        // Kết nối database

        $query = mysqli_query($conn, 'select * from member');
        mysqli_set_charset($conn, 'UTF8');
        // Kiểm tra có dữ liệu không
        echo "<div class='container'>";
        echo "<br>";
        echo "<h2>Dữ liệu từ DB</h2>";
        echo "<br>";
        echo "<table class='table table-hover' border='2'>";
        echo "<thead class='table-warning'>";
        echo "<tr>";
        echo "<td>Username</td>";
        echo "<td>Email</td>";
        echo "</tr>";
        echo "</thead>";
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            echo "<tr>";
            echo "<td>" . ($row['username']) . "</td>";
            echo "<td>" . ($row['email']) . "</td>";
            echo "<tr>";
        }
        echo "</table>";
        echo "</div";
        $conn->close();
        ?>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Nhập giá trị number bằng phương thức post
include_once("inc_db.php");

$email = isset($_POST['email']) ? $_POST['email'] : false;
$name = isset($_POST['name']) ? $_POST['name'] : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;
$MSSV = isset($_POST['MSSV']) ? $_POST['MSSV'] : false;
$date = isset($_POST['date']) ? $_POST['date'] : false;

$sql = "INSERT INTO student (name, email, password, student_code, registered_date) 
                   VALUES ('$name','$email','$password','$MSSV','$date')";
if ($cn->query($sql) === TRUE){
    	echo "1";
    }

?>

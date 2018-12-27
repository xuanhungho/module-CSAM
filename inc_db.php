<?php
      ini_set('register_globals','off'); 
	  error_reporting(0);     
      $host = "locahost";
 	  $username = "root";
	  $password = "";
	  $dbname = "ktx";
	  $cn = new mysqli('localhost', 'root', '', 'ktx');
	  if ($cn->connect_error) {
     	die("Kết nối thất bại: " . $cn->connect_error);
		}
	  mysqli_set_charset($cn, 'UTF8');
?>
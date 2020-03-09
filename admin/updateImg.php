<?php 
	header("Content-Type: text/html;charset=utf-8");
	$img_name = $_POST["index"];
	//增加数据
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	// $filename = $_FILES['files']['name'];
	$error = $_FILES['files']['error'];
	$tmp_name = $_FILES['files']['tmp_name'];
	move_uploaded_file($tmp_name , "../images/".$img_name);
	
	echo " <script> ";  
	echo " window.location.href = 'content4.html' ";  
	echo " </script> ";
?>
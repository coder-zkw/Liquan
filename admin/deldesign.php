<?php 
	header("Content-Type: text/html;charset=utf-8");
	$id = $_POST['index'];
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	$mydb = mysqli_connect($servername,$username,$password,$dbname);
	if(!$mydb){
		die("连接失败：".mysqli_connect_error);
	}
	mysqli_select_db($mydb,"my_db");
	mysqli_query($mydb,"DELETE FROM designs WHERE ID='$id'");
	echo " <script> ";  
	echo " window.location.href = 'content1.html' ";  
	echo " </script> ";
	mysqli_close($mydb);
 ?>
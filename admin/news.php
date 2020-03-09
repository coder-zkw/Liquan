<?php 
	header("Content-Type: text/html;charset=utf-8");
	$title = $_POST["title"];
	$newswords = $_POST["newswords"];
	$date = $_POST["time"];
	//增加数据
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	$filename = date('YmdHis').$_FILES['files']['name'];
	$error = $_FILES['files']['error'];
	$tmp_name = $_FILES['files']['tmp_name'];
	move_uploaded_file($tmp_name , "../updateImages/".$filename);
	$mydb = mysqli_connect($servername,$username,$password,$dbname);
	if(!$mydb){
		die("连接失败：".mysqli_connect_error);
	}
	mysqli_query($mydb,"set names 'utf8'");
	$sql = "INSERT INTO news (title,newsword,picture,dates) VALUES ('$title','$newswords','$filename','$date')";
	if(mysqli_query($mydb,$sql)){
		echo " <script> ";  
		echo " window.location.href = 'content0.html' ";  
		echo " </script> ";
	}else{
		echo "error:".$sql."<br>".mysqli_error($mydb);
	}
	
	mysqli_close($mydb);
?>
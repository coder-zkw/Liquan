<?php 
	header("Content-Type: text/html;charset=utf-8");
	$protype = $_POST["protype"];
	$proname = $_POST["proname"];
	$state = $_POST["state"];
	$charact = $_POST["charact"];
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
	$sql = "INSERT INTO tests (protype,proname,state,charact,picture) VALUES ('$protype','$proname','$state','$charact','$filename')";
	if(mysqli_query($mydb,$sql)){
		echo " <script> ";  
		echo " window.location.href = 'content2.html' ";  
		echo " </script> ";
	}else{
		echo "error:".$sql."<br>".mysqli_error($mydb);
	}
	
	mysqli_close($mydb);
 ?>
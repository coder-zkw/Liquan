<?php 
	Session_start(); 
	$sessionId = session_id();//得到sessionid
	//echo $sessionId;
	$user = $_GET["user"];
	$pass = $_GET["password"];
	//连接数据库服务器 
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	// 创建连接
	$con =mysqli_connect($servername, $username, $password, $dbname); 
	//判断用户名和密码是否输入正确 
	$sql = "select * from admin where admin='$user' and password='$pass'"; 
	$resultSet = mysqli_query($con,$sql); 
	if(mysqli_num_rows($resultSet)>0){ 
	    echo "1"; 
	}else{ 
	    echo "0"; 
	} 
	mysqli_close($con);

	//插入数据
	/*$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	$mydb = mysqli_connect($servername,$username,$password,$dbname);
	if(!$mydb){
		die("连接失败：".mysqli_connect_error);
	}
	$sql = "INSERT INTO admin (admin,password) VALUES ('admin','admin')";
	if(mysqli_query($mydb,$sql)){
		echo "admin entry saved sussessfully.";
	}else{
		echo "error:".$sql."<br>".mysqli_error($mydb);
	}
	mysqli_close($mydb);*/
 ?>
<?php 
	header("Content-Type: text/html;charset=utf-8");
	$user = $_POST["user"];
	$pass = $_POST["password"];
	$newpass = $_POST["newpass"];
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
		mysqli_select_db($con,'my_db'); 
		$sqls = "update admin set password='$newpass' where admin='$user'";
		$obj = mysqli_query($con,$sqls);
		if($obj && mysqli_affected_rows($con)){
			echo "修改成功";
		}else{
			echo "修改失败"; 
		}
	}else{ 
	    echo "用户名或密码错误！"; 
	} 
	mysqli_close($con);
 ?>
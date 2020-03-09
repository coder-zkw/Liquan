<?php 
	header("Content-Type: text/html;charset=utf-8");
	$record = $_POST["record"];
	//连接数据库服务器 
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	// 创建连接
	$con =mysqli_connect($servername, $username, $password, $dbname); 

	mysqli_select_db($con,'my_db'); 
	if($record){
		$sqls = "update record set recordNum='$record'";
		$obj = mysqli_query($con,$sqls);
		if($obj && mysqli_affected_rows($con)){
			echo " <script> ";
			echo " alert('更新成功')";
			echo " </script> ";
		}else{
			echo " <script> ";
			echo " alert('更新失败')";
			echo " </script> "; 
		}
	}
	echo " <script> ";  
	echo " window.location.href = 'content4.html' ";  
	echo " </script> ";
	mysqli_close($con);
 ?>
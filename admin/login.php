<?php 
	header('Content-type:text/html;charset=utf-8');
	$user = addslashes($_POST['user']); 
	$pass = addslashes($_POST['password']); 
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
	    echo " <script> ";  
		echo " window.location.href = 'manage.html' ";  
		echo " </script> "; 
	}else{ 
	    echo " <script> ";  
		echo " window.location.href = 'index.html' ";  
		echo " </script> "; 
	} 
	mysqli_close($con);
	
	/*$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "my_db";
	// 创建连接
	$con =mysqli_connect($servername, $username, $password, $dbname);
	  
	// 检测连接
	  
	   
	$sql = "SELECT * FROM admin";
	$result = mysqli_query($con,$sql);
	if (!$result) {
	  printf("Error: %s\n", mysqli_error($con));
	  exit();
	}
	  
	$jarr = array();
	while ($rows=mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小
	  for($i=0;$i<$count;$i++){
	    unset($rows[$i]);//删除冗余数据
	  }
	  array_push($jarr,$rows);
	}
	echo $str=json_encode($jarr);//将数组进行json编码*/

	/*$name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  	//$name = test_input($_POST["name"]);
	  	//$email = test_input($_POST["email"]);
	  	//$website = test_input($_POST["website"]);
	  	//$comment = test_input($_POST["comment"]);
	  	//$gender = test_input($_POST["gender"]);
	  	$user = test_input($_POST['user']);
	  	$pass = test_input($_POST['password']);
	}
	echo $user.'<br/>';
	echo $pass;
	function test_input($data) {
	 	$data = trim($data);
	 	$data = stripslashes($data);
	 	$data = htmlspecialchars($data);
	 	return $data;
	}*/
#建数据库数据表
	$con = mysqli_connect("localhost","root","123456");
	if(!$con)
	{
		die('Could not connect:'.mysql_error());
	}
	if(mysqli_query($con,"CREATE DATABASE my_db"))
	{
		echo "Database created";
	}
	else
	{
		echo "Error creating database:".mysql_error();
	}

	mysqli_select_db($con,"my_db");
	$sql = "CREATE TABLE Persons
	(
	personID int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(personID),
	FirstName varchar(15),
	LastName varchar(15),
	)";
	mysqli_query($con,$sql);
	

	mysqli_close($con);

	//插入数据
	/*$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "my_db";
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
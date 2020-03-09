<?php  
	header("Content-Type: text/html;charset=utf-8");
	/*echo '这是一个PHP页面';
	$title = $_POST['title'];
	$words = $_POST['newswords'];
	echo "<br/>";
	echo $title.'<br/>';
	echo $words.'<br/>';
	$filename = $_FILES['files']['name'];
	$error = $_FILES['files']['error'];
	echo $filename;
	echo $error.'<br/>';
	echo $_FILES['files']['type'].'<br/>';
	echo $_FILES['files']['size'].'<br/>';
	$tmp_name = $_FILES['files']['tmp_name'];
	move_uploaded_file($tmp_name , "../www/".$filename);
	echo $filename;*/

	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";

	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// 检测连接
	if (!$conn) {
	    die("连接失败: " . mysqli_connect_error());
	}

	// 使用 sql 创建数据表
	/*$sql = "CREATE TABLE admin (
	admin VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	password VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
	)";*/

	/*$sql = "CREATE TABLE news (
	Id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	title VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	newsword VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	picture VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	dates VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
	)";*/

	/*$sql = "CREATE TABLE designs (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	proname VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	designname VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	protype VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	trait VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	advantage VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	remark VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
	picture1 VARCHAR(30) NOT NULL,
	picture2 VARCHAR(30)
	)";*/

	// $sql = "CREATE TABLE tests (
	// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	// protype INT(5) NOT NULL,
	// proname VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	// state VARCHAR(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	// charact VARCHAR(2000) CHARACTER SET utf8 COLLATE utf8_general_ci,
	// picture VARCHAR(255) NOT NULL
	// )";

	/*mysqli_select_db($conn,"my_db");
	//修改数据表tests字段为picture的长度
	//mysqli_query($conn,"alter table tests modify column picture VARCHAR(100)");
	//删除名为nnews的数据表
	mysqli_query($conn,"DROP TABLE tests");*/

	// 新建备案号数据表
	$sql = "CREATE TABLE record (
	recordNum VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
	)";

		// 单独赋值语句
    // mysqli_select_db($con,'my_db'); 
	// $sql = "INSERT INTO record (recordNum) VALUES ('$record')";
	// $obj = mysqli_query($con,$sql);
	// if($obj && mysqli_affected_rows($con)){
	// 	echo "赋值成功";
	// }else{
	// 	echo "赋值失败"; 
	// }

	if (mysqli_query($conn, $sql)) {
	    echo "数据表 record 创建成功";
	} else {
	    echo "创建数据表错误: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
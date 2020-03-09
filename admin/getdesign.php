<?php 
	header("Content-Type: text/html;charset=utf-8");
	header('Content-Type:application/json');
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	$mydb = mysqli_connect($servername,$username,$password,$dbname);
	if(!$mydb){
		die("连接失败：".mysqli_connect_error);
	}
	mysqli_query($mydb,"set names 'utf8'");
	$sql = 'select * from designs';
	$result = mysqli_query($mydb,$sql);
	$records = array();
	while( $record = mysqli_fetch_assoc($result)){
		$records[] = $record;
	}
	$json = json_encode($records);
	echo $json;
	mysqli_close($mydb);
 ?>
<?php 
	header("Content-Type: text/html;charset=utf-8");
	$proname = $_POST["proname"];
	$designname = $_POST["designname"];
	$protype = $_POST["protype"];
	$tedian = $_POST["tedian"];
	$youshi = $_POST["youshi"];
	$remark = $_POST["remark"];
	//增加数据
	$servername = "mysql.sql67.eznowdata.com";
	$username = "sq_icom";
	$password = "ico23588";
	$dbname = "sq_icom";
	$error = $_FILES['files']['error'];
	$tmp_name = $_FILES['files']['tmp_name'];
	$arr = array();
	$max_files=2;
	for($i=0;$i<$max_files;$i++){
		if($error[$i]==0){
			move_uploaded_file($tmp_name[$i], "../updateImages/".date('YmdHis').$_FILES['files']['name'][$i]);
			array_push($arr,date('YmdHis').$_FILES['files']['name'][$i]);
		}
	}
	$mydb = mysqli_connect($servername,$username,$password,$dbname);
	if(!$mydb){
		die("连接失败：".mysqli_connect_error);
	}
	mysqli_query($mydb,"set names 'utf8'");
	$sql = "INSERT INTO designs (proname,designname,protype,trait,advantage,remark,picture1,picture2) VALUES ('$proname','$designname','$protype','$tedian','$youshi','$remark','$arr[0]','$arr[1]')";
	if(mysqli_query($mydb,$sql)){
		echo " <script> ";  
		echo " window.location.href = 'content1.html' ";  
		echo " </script> ";
	}else{
		echo "error:".$sql."<br>".mysqli_error($mydb);
	}
	
	mysqli_close($mydb);
 ?>
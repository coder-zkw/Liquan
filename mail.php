<?php 
	header("Content-Type: text/html;charset=utf-8");
	$title = $_POST["Title"];
	$company = $_POST["Company"];
	$address = $_POST["Address"];
	$linkman = $_POST["Linkman"];
	$phone = $_POST["Phone"];
	$mail = $_POST["Mail"];
	$message = $_POST["Message"];
	$href = $_POST["hrefStr"];
	$content = "反馈标题：".$title."<br>公司名称：".$company."<br>公司地址：".$address."<br>发件人：".$linkman."<br>联系电话：".$phone."<br>邮箱：".$mail."<br>详细说明：".$message;

    function sendMail($to,$title,$content) {
	    require './PHPMailer/PHPMailerAutoload.php';
	    $mail = new PHPMailer;
	    $mail->isSMTP();
	    $mail->SMTPAuth = true;
	    $mail->Host = 'smtp.exmail.qq.com';
	    $mail->Username = 'backstage-web@ritern.com';
	    $mail->Password = 'Jn9YxFSGL5jJZPEi';
	    $mail->setFrom('backstage-web@ritern.com', "立全官网访客");
	    $mail->addAddress($to);
	    $mail->Subject = $title;
	    $mail->Body = $content;
	    $mail->IsHTML(true);
	    if(!$mail->send()) {
	        echo '发送失败: ' . $mail->ErrorInfo;
	    } else {
	        echo "邮件发送成功";
	    }
	}
	if(strpos($href, 'ritern.com') !== false) {
		sendMail('info@ritern.com','立全官网问题反馈',$content);
	}
 ?>
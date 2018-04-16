<?php 
	$msg="";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/Exception.php";
	if(isset($_POST['btn']))
	{
		$subject=$_POST['subject'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		
		$mail=new PHPMailer();
		$mail->setFrom('freezysoumah@gmail.com','Saidou Soumah');
		$mail->addAddress($email,'');
		$mail->subject=$subject;
		$mail->isHTML(true);
		$mail->Body="Bonjour Mr:".$email."voici ce que vous avez rentréz:<br/>".$message.".<br/>";

		if(!$mail->send())
		{
			echo" Please try again".$mail->ErrorInfo;
		}
		else
		{
			echo"Your email has been sent , thank you !";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" action="sendemail.php" style="text-align: center;">
			<input type="text" name="subject" id="subject" placeholder="Subject..." /><br/>
			<input type="email" name="email" id="email" placeholder="Email..." /><br/>
			<textarea name="message" placeholder="Message"></textarea><br>
			<input type="submit" name="btn" value="Validez">
		</form>
	</body>
</html>
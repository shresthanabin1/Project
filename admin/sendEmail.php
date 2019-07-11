<?php 
	use PHPMailer/PHPMailer/PHPMailer;

	if (isset($_POST['name'] $$ isset($_POST['email'])) {
		$name  = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$body = $_POST['body'];


		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";
		require_once "PHPMailer/PHPMailer.php";


		 $mail = new PHPMailer();
         
         //this method call the SMTP setting
         $mail->isSMTP();
         $mail->Host = "smtp.gmail.com";
         $mail->Port = 465;
         $mail->SMTPAuth = true;
         $mail->Username = "shresthanabin244@gmail.com";
         $mail->Password = "Urmila244";
         $mail->SMTPSecure = "ssl"; 
         
         //this method call the email setting
         $mail->IsHTML(true);
         $mail->setFrom($email, $name);
         $mail->addAddress("holidaystonepal23@gmail.com");
         $mail->Subject = $subject;
         $mail->Body = $body;
          
         if ($mail->send()) 
            $response = "Email is sent";
         
         else
         
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
         
         exit(json_encode(array("response" => $response)));

	}
 ?>
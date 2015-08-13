<?php

require_once "vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "nandwa.moses@gmail.com";
$mail->Password = "M41NANDWA";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "nandwa.moses@gmail.com";
$mail->FromName = "Full Name";

$mail->addAddress($_POST['email']);

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Gizani</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div class="row">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-8">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                	<h2>Gizani</h2>
                    <p> Hi, </p>
                    <p>
You have succesifully booked a ticket for Gizani Dinning in the Dark
</p>
                    <p>
regards,
                        <br>
Gizani Team.
                    </p>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                </div>
            </div>
            <div class="col-sm-2">

            </div>
		</div>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
</html>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}
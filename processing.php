<?php
/**
 * Created by PhpStorm.
 * User: moses
 * Date: 8/9/15
 * Time: 2:59 PM
 */
// this  is thee php file that will be useed in the processing of the  forms.
// so first i will start by initializig the values



// these are the details from the the person booking the ticket



$radio=$_POST['sessions'];
$ePrice=$_POST['price'];
$pSize=$_POST['party'];
$amountPaid=$pSize*$ePrice;
$methodd=$_POST['payments'];
echo $radio;
echo $methodd;
if($methodd=="mpesa"){
    $status="not confirmed";
    $code=$_POST['code'];
}
else{
    //stripe value$code=$_POST[''];
    $status=="confirmed";
}

/*
require_once "vendor/autoload.php";
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "nandwa.moses@gmail.com";  // SMTP username
$mail->Password = "M41NANDWA"; // SMTP password

$mail->From = "moses@gizani.com";
$mail->FromName = "Gizanir";
$mail->AddAddress ($_POST['email']);
                  // name is optional
$mail->AddReplyTo("moses@gizani.com");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Thanks";
$mail->Body    = file_get_contents("emal.html");
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}






\Stripe\Stripe::setApiKey("pk_test_epuy9kWiGoIklHviDACQpUiw");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
    $charge = \Stripe\Charge::create(array(
            "amount" => 1000, // amount in cents, again
            "currency" => "usd",
            "source" => $token,
            "description" => "Example charge")


$mail->addAddress($_POST['email']);
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

$mail->isHTML(true);
$mail->Subject = "Subject Text";
    );
} catch(\Stripe\Error\Card $e) {
    // The card has been declined
}
*/
$names ="";
if(isset($_POST["namee"])){
    foreach($_POST["namee"] as $key => $text_field){
        $names .= $text_field .", ";
    }
}


$emails ="";
if(isset($_POST["emaill"])){
    foreach($_POST["emaill"] as $key => $text_field){
        $emails .= $text_field .", ";
    }
}


$phones ="";
if(isset($_POST["phonee"])){
    foreach($_POST["phonee"] as $key => $text_field){
        $phones .= $text_field .", ";
    }
}


$allergies ="";
if(isset($_POST["allergies"])){
    foreach($_POST["allergies"] as $key => $text_field){
        $allergies .= $text_field .", ";
    }
}


$servername = "localhost";
$username = "root";
$password = "qwerty41";
$dbname = "book";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exc    eption

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO bookings (payMethod, code, eventID, paid, sittingID, amountPaid)
    VALUES ('".$_POST['payments']."','".$_POST['code']."','".$_POST['eventID']."','$status','".$_POST['sessions']."',$amountPaid)";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();

    $sql2 = "INSERT INTO attendees (fName, phone, email ,allergies, bookingID, bookerStatus)
    VALUES ('$names','$phones','$emails','$allergies','$lastID','".$_POST['fName']."')";
    $conn->exec($sql2);
    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


// do emails


<?php
/**
 * Created by PhpStorm.
 * User: moses
 * Date: 8/9/15
 * Time: 2:59 PM
 */
// this  is thee php file that will be useed in the processing of the  forms.
// so first i will start by initializig the values
require_once 'connections.php';


// these are the details from the the person booking the ticket
$fName=mysqli_real_escape_string($_POST['fName']);
$lName=mysqli_real_escape_string($_POST['lName']);
$email=mysqli_real_escape_string($_POST['email']);
$phone=mysqli_real_escape_string($_POST['phone']);
$allergies=mysqli_real_escape_string($_POST['allergies']);
$partySize=mysqli_real_escape_string($_POST['oarty']);
$token=mysqli_real_escape_string($_POST['']);
$eventName=mysqli_real_escape_string($_POST['eventName']);
$eventPrice=mysqli_real_escape_string($_POST['price']);
$SittingName=mysqli_real_escape_string($_POST['sittingName']);
$sittingTime=mysqli_real_escape_string($_POST['sittingTime']);
$eventExtras=mysqli_real_escape_string($_POST['extras']);
$eventLocation=mysqli_real_escape_string($_POST['location']);




// heere i will do the select query that will fetch the info from the database



// here i will initialize the values for the variables that were fetched from the database




// here i will  process the payments for stripe

if(){
    //do stripe
}
elseif  (){
    //do mpesa
}
else{
    echo "please pay";
}








// do emails


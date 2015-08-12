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




$servername = "localhost";
$username = "root";
$password = "qwerty41";
$dbname = "book";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO attendees (fName, lName, email)
    VALUES ('".$_POST['fName']."','".$_POST['lName']."','".$_POST['email']."')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


// do emails


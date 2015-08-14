<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=book;','root','qwerty41');


//Output any connection error


$name ="";
if(isset($_POST["namee"])){
    foreach($_POST["namee"] as $key => $text_field){
        $name .= $text_field .", ";
    }
}

$name=explode(',',($name));

$email ="";
if(isset($_POST["emaill"])){
    foreach($_POST["emaill"] as $key => $text_field){
        $email .= $text_field .", ";
    }
}

$email=explode(',',($email));


$phone ="";
if(isset($_POST["phonee"])){
    foreach($_POST["phonee"] as $key => $text_field){
        $phone.= $text_field .", ";
    }
}

$phone=explode(',',($phone));

$allergies ="";
if(isset($_POST["allergyy"])){
    foreach($_POST["allergyy"] as $key => $text_field){
        $allergies .= $text_field .", ";
    }
}

$allergies=explode(',',($allergies));
    $query=null;
    $pdo;
    $prepare;


for ($i = 0; $i < count($name); $i++) {

    $query = $pdo->prepare("INSERT INTO attendees (fName, email, phone, allergies) VALUES (:name, :email, :phone ,:allergies)");
    $query->execute(array(
        ":name" => $name[$i],
        ":email" => $email[$i],
        ":phone" => $phone[$i],
        ":allergies" => $allergies[$i]
    ));
}



} catch(PDOException $e){
echo 'Connection failed'.$e->getMessage();
}
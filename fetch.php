<?php

$db_database = 'book';
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'qwerty41';


$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MYSQL: ". mysql_error());

mysql_select_db($db_database)
or die("Unable to connect to database: " . mysql_error());

$sql = mysql_query("SELECT * FROM Events");
if(!$sql) die("Unable to connect to MYSQL: ". mysql_error());
$results = array();
while($row = mysql_fetch_array($sql))
{
    $results[] = array(

        'id' => ($row['eventID']),
        'price' => $row['evntPrice'],
        'pay' => $row['evntPay'],
        'desc' => $row['evntDescription'],
        'location' => $row['evntLocation'],
        'date' => $row['eventDate'],
        'extras' => $row['eventExtras'],
        'coordinates' => $row['eventCoordinates']
    );
}
echo json_encode($results);

?>
<?php
/**
 * Created by PhpStorm.
 * User: moses
 * Date: 8/9/15
 * Time: 11:25 PM
 */

$db_database = 'book';
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'qwerty41';


$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MYSQL: ". mysql_error());

mysql_select_db($db_database)
or die("Unable to connect to database: " . mysql_error());

<?php
$db= new mysqli('localhost','root','','mydb');

if ($db->connect_errno) {
	die("Sorry,Unable to connect.");
}
?>
<?php
ob_start(); //Turns on output buffering
session_start();
date_default_timezone_set("Europe/London");
try{
#$con = new PDO("mysql:dbname=kflix;host=localhost,"root","",3307)
$con = new PDO('mysql:host=localhost;port=3307;dbname=kflix', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE,PDO ::ERRMODE_WARNING);


}
catch (PDOException $e){
exit("Connection failed:".$e->getMessage());

}
?>
<?php
$server="localhost";
$user="root";
$password="nanu";
$database="jhanvibutik";

$conn =mysqli_connect($server,$user,$password,$database);
if(!$conn){
    die("connection fail");
}
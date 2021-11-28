<?php

$servername = "localhost";
$dbUsername = "team21";
$dbPassword = "team21";
$dbName = "team21";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
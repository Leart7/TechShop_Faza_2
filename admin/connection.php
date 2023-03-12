<?php

$servername = "localhost";
$username = "root";
$dbname = "techshop";

$dbconn = new mysqli($servername,$username,"",$dbname);

if($dbconn->connect_error){
  die("Lidhja deshtoi " .$dbconn->connect_error);
}




?>
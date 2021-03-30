<?php

$server = "sql207.epizy.com";
$username = "epiz_28235241";
$password = "i6GrwlkGHvU";
$dbname = "epiz_28235241_projectDB";



$db = mysqli_connect($server, $username, $password, $dbname);

if(!$db){
    echo "Connection Failed";
}
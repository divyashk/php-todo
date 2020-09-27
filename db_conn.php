<?php

$sName = "eu-cdbr-west-03.cleardb.net";
$uName = "b679c9b98a554a";
$pass = "dce2aca0";
$db_name = "heroku_9d7e970d06caaaa";

try{
    $conn = new PDO("mysql:host=$sName;dbname=$db_name",$uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
}catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
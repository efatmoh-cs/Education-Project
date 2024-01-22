

<?php

$servername = "localhost";
$username = "root";
$password = "";

try{ 
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
   
    $conn = new PDO("mysql:host=$servername;dbname=un_r1_project", $username, $password);//the name of db change if i create new db
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>
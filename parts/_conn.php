<?php
$host = "mysql:host=localhost;dbname=mt_discuss3658";
$user = "root";
$password = "";

try{
    $conn = new PDO($host, $user, $password);
    // echo "Successfully Connected";
}
catch(PDOException $e){
    echo $e->getMessage();
}



?>
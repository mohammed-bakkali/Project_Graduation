<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'hospital';
$database = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

    // if ($database) {
    //     echo 'Yes';
    //     # code...
    // }


?>
<?php 
$servername = "localhost";
$username = "root";
//created DB on phpmyAdmin called test
//test includes table called users

session_start();
    try{ 
        $conn = new PDO("mysql:host=$servername;dbname=test", $username);

        
        echo "connected successfully";
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }


include ('assignment4-form.php');

?>
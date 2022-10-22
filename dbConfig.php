<?php  
// 2 forms of db config

// // Database configuration  
// $dbHost     = "localhost";  
// $dbUsername = "Username";  
// $dbPassword = "Password";  
// $dbName     = "test_image";  
  
// // Create database connection  
// $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// // Check connection  
// if ($db->connect_error) {  
//     die("Connection failed: " . $db->connect_error);  
// }

try {
    $db = new PDO('mysql:host=localhost;dbname=test_image', "Username", "Password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

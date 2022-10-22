<?php 
// Delete a picture in the db (Delete pZ)

// Include the database configuration file  
require_once 'dbConfig.php'; 
$id = $_POST['id'];

// Get image data from database 
$request = "DELETE FROM images WHERE id = $id";
$preparation = $db->prepare($request);
$preparation->execute();

header("Location: view.php")
?>
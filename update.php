<?php 
// Update a picture in the db (Update p2)

// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// If file update form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
            $id = $_POST["id"];
         
            // Modify image content into database 
            $update = $db->query("UPDATE images SET (image) VALUES ('$imgContent') WHERE id = $id"); 

            if($update){ 
                $status = 'success'; 
                $statusMsg = "File updated successfully."; 
            }else{ 
                $statusMsg = "File update failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to update.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to update.'; 
    } 
} 
 
// Display status message 
echo $statusMsg;

// header("Location: view.php")

?>
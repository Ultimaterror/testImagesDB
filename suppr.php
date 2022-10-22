<?php 
// Verify if you really want to delete a picture (Delete p1)

// Include the database configuration file  
require_once 'dbConfig.php'; 
$id = $_POST['id'];

// Get image data from database 
$request = "SELECT * FROM images WHERE id = $id";
$preparation = $db->prepare($request);
$preparation->execute();
$result = $preparation->fetch(PDO::FETCH_ASSOC);
?>

<?php if(!empty($result)){ ?> 
    <div class="gallery"> 
        <div>
            <div style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; margin: 5px;">
                <img style="max-width: 200px; max-height: 200px; width: auto; height: auto;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result['image']); ?>" /> 
            </div>
        </div>
    </div>
    <form action="delete.php" method="post" enctype="multipart/form-data">
        <label>Do you really want to delete this picture ?</label>
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="submit" name="submit" value="Yes">
        <a href="view.php">No</a>
    </form>
<?php }else{ ?> 
    <p class="status error">Image not found...</p> 
<?php } ?>
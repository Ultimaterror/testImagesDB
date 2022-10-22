<?php 
// View all pictures (Read)

// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// Get image data from database 
$request = "SELECT * FROM images ORDER BY id DESC";
$preparation = $db->prepare($request);
$preparation->execute();
$results = $preparation->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if(!empty($results)){ ?> 
    <div class="gallery"> 
        <?php foreach($results as $row){ ?> 
            <div>
                <div style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; margin: 5px;">
                    <img style="max-width: 200px; max-height: 200px; width: auto; height: auto;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
                </div>
                <form action="modify.php" method="post">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <input type="submit" value="Modify">
                </form>
                <form action="suppr.php" method="post">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <input type="submit" value="Suppr">
                </form>
            </div>
                <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
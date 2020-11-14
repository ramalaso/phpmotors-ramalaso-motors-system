<?php
    // Build the classifications option list
    $classifList = '<select name="classificationId" id="classificationId">';
    $classifList .= "<option>Choose a Car Classification</option>";
    foreach ($classifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classifList .= ' selected ';
        }
        } elseif(isset($invInfo['classificationId'])){
            if($classification['classificationId'] === $invInfo['classificationId']){
            $classifList .= ' selected ';
        }
    }
    $classifList .= ">$classification[classificationName]</option>";
    }
    $classifList .= '</select>';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css" media="screen" />
    <link rel="stylesheet" href="../css/styleLogin.css" media="screen" />
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	 echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	 elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
  </head>
  <body>
    <div class="container">
      <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/header.php'?>
      </header>
      <nav>
      <?php echo $navList; ?>
      </nav>
      <main>
      <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
            echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
        elseif(isset($invMake) && isset($invModel)) { 
            echo "Modify $invMake $invModel"; }?></h1>
      <div class="containerLogin">
        <form id="form" class="form" action="/vehicles/index.php" method="POST">
            <h2>Update vehicle</h2>
            <?php
            if (isset($message)) {
            echo $message;
            }
            ?>
            <div class="form-control">
                <label for= "classificationId">Classification</label>
                <?php
                echo $classifList;
                ?>
            </div>
            <div class="form-control">
                <label for="invMake">Make</label>
                <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
            </div>
            <div class="form-control">
                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
            </div>
            
            <div class="form-control">
                <label for="invDescription">Description</label>
                <textarea name="invDescription" id="invDescription" required>
                <?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
            </div>
            <div class="form-control">
                <label for="invImage">Image</label>
                <input type="text" id="invImage" placeholder="Enter image path" name="invImage"  required <?php if(isset($invImage)){ echo "value='$invImage'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>>
            </div>
            <div class="form-control">
                <label for="invThumbnail">Thumbnail</label>
                <input type="text" id="invThumbnail" placeholder="Enter password" name="invThumbnail"  required <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>>
            </div>
            <div class="form-control">
                <label for="invPrice">Price</label>
                <input type="text" id="invPrice" placeholder="Enter price" name="invPrice"  required <?php if(isset($invPrice)){ echo "value='$invPrice'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>>
            </div>
            <div class="form-control">
                <label for="invStock">Stock</label>
                <input type="text" id="invStock" placeholder="Enter stock" name="invStock"  required <?php if(isset($invStock)){ echo "value='$invStock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>>
            </div>
            <div class="form-control">
                <label for="invColor">Color</label>
                <input type="text" id="invColor" placeholder="Enter color" name="invColor"  required <?php if(isset($invColor)){ echo "value='$invColor'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>>
            </div>
            <button type="submit" class="submit" id="regbtn">Update Vehicle</button>
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="
            <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
            elseif(isset($invId)){ echo $invId; } ?>
            ">
        </form>
    </div>
      </main>
      <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
      </footer>
    </div>
  </body>
</html>
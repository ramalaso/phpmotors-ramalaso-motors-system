<?php
    $classifList = '<select name="classificationId">';
    foreach ($classifications as $classification) {
        # code...
        $classifList .= "<option value='$classification[classificationId]'";
        if(isset($classificationId)){
            if($classification['classificationId']===$classificationId){
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
    <title>PHP Motors</title>
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
      <div class="containerLogin">
        <form id="form" class="form" action="/vehicles/index.php" method="POST">
            <h2>Add new vehicle</h2>
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
                <input type="text" id="invMake" placeholder="Enter make" name="invMake" 
                <?php if(isset($invMake)){echo "value='$invMake'";} ?> required>
            </div>
            <div class="form-control">
                <label for="invModel">Model</label>
                <input type="text" id="invModel" placeholder="Enter model" name="invModel"  <?php if(isset($invModel)){echo "value='$invModel'";} ?> required>
            </div>
            
            <div class="form-control">
                <label for="invDescription">Description</label>
                <textarea type="text" id="invDescription" placeholder="Enter description" <?php if(isset($invDescription)){echo "value='$invDescription'";} ?> name="invDescription" required></textarea>
            </div>
            <div class="form-control">
                <label for="invImage">Image</label>
                <input type="text" id="invImage" placeholder="Enter image path" name="invImage"  <?php if(isset($invImage)){echo "value='$invImage'";} ?> required>
            </div>
            <div class="form-control">
                <label for="invThumbnail">Thumbnail</label>
                <input type="text" id="invThumbnail" placeholder="Enter password" name="invThumbnail"  <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required>
            </div>
            <div class="form-control">
                <label for="invPrice">Price</label>
                <input type="text" id="invPrice" placeholder="Enter price" name="invPrice"  <?php if(isset($invPrice)){echo "value='$invPrice'";} ?>  required>
            </div>
            <div class="form-control">
                <label for="invStock">Stock</label>
                <input type="text" id="invStock" placeholder="Enter stock" name="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} ?>  required>
            </div>
            <div class="form-control">
                <label for="invColor">Color</label>
                <input type="text" id="invColor" placeholder="Enter color" name="invColor"  <?php if(isset($invColor)){echo "value='$invColor'";} ?> required>
            </div>
            
            <button type="submit" class="submit" id="regbtn">Add Vehicle</button>
            <input type="hidden" name="action" value="adding-vehicle">
        </form>
    </div>
      </main>
      <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
      </footer>
    </div>
  </body>
</html>

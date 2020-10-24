<!DOCTYPE html>
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
            <?php
                function createSelectBox(){
                $classifications = getClassifications();
                // Build a navigation bar using the $classifications array
                    $options= '<select id= "classificationId" name="classificationId">';
                    foreach ($classifications as $classification) {
                        $options .= sprintf("<option value='%s'>%s</option>", $classification['classificationId'], $classification['classificationName']);
                        }
                    $options .= '</select>';
                    return $options;
                }
            ?>
            <div class="form-control">
                <label for= "classificationId">Classification</label>
                <?php
                echo createSelectBox()
                ?>
                <!-- <input type="text" id= "invModel" placeholder="Enter last name" name="invModel"> -->
            </div>
            <div class="form-control">
                <label for="invMake">Make</label>
                <input type="text" id="invMake" placeholder="Enter first name" name="invMake">
            </div>
            <div class="form-control">
                <label for="invModel">Model</label>
                <input type="text" id="invModel" placeholder="Enter model" name="invModel">
            </div>
            
            <div class="form-control">
                <label for="invDescription">Description</label>
                <input type="text" id="invDescription" placeholder="Enter email" name="invDescription">
            </div>
            <div class="form-control">
                <label for="invImage">Image</label>
                <input type="text" id="invImage" placeholder="Enter image path" name="invImage">
            </div>
            <div class="form-control">
                <label for="invThumbnail">Thumbnail</label>
                <input type="text" id="invThumbnail" placeholder="Enter password" name="invThumbnail">
            </div>
            <div class="form-control">
                <label for="invPrice">Price</label>
                <input type="text" id="invPrice" placeholder="Enter price" name="invPrice">
            </div>
            <div class="form-control">
                <label for="invStock">Stock</label>
                <input type="text" id="invStock" placeholder="Enter stock" name="invStock">
            </div>
            <div class="form-control">
                <label for="invColor">Color</label>
                <input type="text" id="invColor" placeholder="Enter color" name="invColor">
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

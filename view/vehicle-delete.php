<?php
if($_SESSION['clientData']['clientLevel'] < 2){
 header('location: /phpmotors/');
 exit;
}
?>
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
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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
      <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</h1>
      <div class="containerLogin">
        <form id="form" class="form" action="/vehicles/index.php" method="POST">
            <h2>Delete vehicle</h2>
            <?php
            if (isset($message)) {
            echo $message;
            }
            ?>
            <div class="form-control">
                <label for="invMake">Make</label>
                <input type="text" name="invMake" id="invMake" readonly <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
            </div>
            <div class="form-control">
                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" readonly <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
            </div>
            
            <div class="form-control">
                <label for="invDescription">Description</label>
                <textarea name="invDescription" id="invDescription" readonly>
                <?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
            </div>
            <button type="submit" class="submit" id="regbtn">Delete Vehicle</button>
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
            echo $invInfo['invId'];} ?>">
        </form>
    </div>
      </main>
      <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
      </footer>
    </div>
  </body>
</html>
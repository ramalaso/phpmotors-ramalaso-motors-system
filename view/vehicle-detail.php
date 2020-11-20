<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/style.css" media="screen" />
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
        <div class="container-detail">
            <img src='<?php if(isset($vehicleData['invThumbnail'])) {echo "$vehicleData[invThumbnail]";} ?>' />
            <h1> <?php if(isset($vehicleData['invMake'])) {echo "$vehicleData[invMake]";} ?> </h1>
            <h4> <?php if(isset($vehicleData['invDescription'])) {echo "$vehicleData[invDescription]";} ?></h4>
            <h4> <?php if(isset($vehicleData['invPrice'])) {echo "$vehicleData[invPrice]";} ?></h4>
            <h4> <?php if(isset($vehicleData['invModel'])) {echo "$vehicleData[invModel]";} ?></h4>
        </div>   
    </main>
    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
    </footer>
  </div>
</body>

</html>
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
    <h1> <?php if(isset($vehicleData['invMake'])) {echo "$vehicleData[invMake]";} ?> </h1>
    <p> <?php if(isset($vehicleData['invDescription'])) {echo "$vehicleData[invDescription]";} ?></p>
   <p> <?php if(isset($vehicleData['invPrice'])) {echo "$vehicleData[invPrice]";} ?></p>
   <p> <?php if(isset($vehicleData['invModel'])) {echo "$vehicleData[invModel]";} ?></p>
   
    </main>
    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
    </footer>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/style.css" media="screen" />
  <link rel="stylesheet" href="../css/styleLogin.css" media="screen" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
        <form id="form" class="form">
            <h2>Vehicle Management</h2>
            <a href="../vehicles/index.php?action=add-classification" class="create">Add classification</a>
            <a href="../vehicles/index.php?action=add-vehicle" class="create">Add Vehicle</a>
        </form>
      </div>
      <div class="containerLogin">
      <?php      
      if (isset($message)) { 
        echo "<small>".$_SESSION['message']."</small>";
      } 
      if (isset($classificationList)) { 
      echo '<h2>Vehicles By Classification</h2>'; 
      echo "<div class='form-control'>
      <label for= 'classificationId'>Choose a classification to see those vehicles</label>". $classificationList."</div>";
      }
      ?>
      </div>
      <noscript>
      <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
      </noscript>
        <div class="containerLogin">
          <div class='form-control'>
              <table id="inventoryDisplay"></table>
          </div>
        </div>
      </main>
      <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
      </footer>
    </div>
    <script src="../js/inventory.js"></script>
  </body>
</html>
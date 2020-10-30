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
            <h2>Add Classification</h2>
            <?php
            if (isset($message)) {
            echo $message;
            }
            ?>
            <div class="form-control">
                <label for="classificationName">First Name</label>
                <input type="text" id="classificationName" placeholder="Add classification name" name="classificationName" <?php if(isset($classificationName)){echo "value='$classificationName'";} ?>  required>
            </div>
            <button type="submit" class="submit" id="regbtn">Add Classification</button>
            <input type="hidden" name="action" value="adding-classification">
        </form>
    </div>
      </main>
      <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
      </footer>
    </div>
  </body>
</html>
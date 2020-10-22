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
        <form id="form" class="form" action="/accounts/index.php" method="POST">
            <h2>Register with us</h2>
            <?php
            if (isset($message)) {
            echo $message;
            }
            ?>
            <div class="form-control">
                <label for="fName">First Name</label>
                <input type="text" id="fName" placeholder="Enter first name" name="clientFirstname">
            </div>
            <div class="form-control">
                <label for= "lName">Last Name</label>
                <input type="text" id= "lName" placeholder="Enter last name" name="clientLastname">
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="text" id="email" placeholder="Enter email" name="clientEmail">
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter password" name="clientPassword">
            </div>
            <button type="submit" class="submit" id="regbtn">Register</button>
            <input type="hidden" name="action" value="register">
        </form>
    </div>
      </main>
      <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
      </footer>
    </div>
  </body>
</html>
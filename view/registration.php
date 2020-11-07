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
          <?php if (isset($message)) {
            echo "<small>$message</small>" ; } ?>
          <div class="form-control">
            <label for="fName">First Name</label>
            <input type="text" id="fName" placeholder="Enter first name" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>
          </div>
          <div class="form-control">
            <label for="lName">Last Name</label>
            <input type="text" id="lName" placeholder="Enter last name" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
          </div>
          <div class="form-control">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter email" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
          </div>
          <div class="form-control">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter password" name="clientPassword" required
              pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <span class="passwordLabel">Passwords must be at least 8 characters and contain at least 1 number, 1 capital
              letter and 1 special character</span>
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
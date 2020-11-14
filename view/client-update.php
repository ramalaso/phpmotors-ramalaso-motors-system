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
          <h2>Update client data</h2>
          <?php if (isset($message)) {
            echo "<small>$message</small>" ; } ?>
          <div class="form-control">
            <label for="fName">First Name</label>
            <input type="text" id="fName" required placeholder="Enter first name" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} elseif(isset($clientInfo['clientFirstname'])) {echo "value='$clientInfo[clientFirstname]'"; } ?> >
          </div>
          <div class="form-control">
            <label for="lName">Last Name</label>
            <input type="text" id="lName" placeholder="Enter last name" required name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} elseif(isset($clientInfo['clientLastname'])) {echo "value='$clientInfo[clientLastname]'"; } ?> >
          </div>
          <div class="form-control">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter email" required name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} elseif(isset($clientInfo['clientEmail'])) {echo "value='$clientInfo[clientEmail]'"; } ?> >
          </div>
          <button type="submit" class="submit" id="regbtn">Update Data</button>
          <input type="hidden" name="action" value="updateAccount">
          <input type="hidden" name="clientId" value="
            <?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
            elseif(isset($clientId)){ echo $clientId; } ?>
            ">
        </form>
        <form id="form1" class="form" action="/accounts/index.php" method="POST">
          <h2>Update password</h2>
          <div class="form-control">
            <label for="password">Password</label>
            <input type="password" id="password" required placeholder="Enter password" name="clientPassword"
              pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <span class="passwordLabel">Passwords must be at least 8 characters and contain at least 1 number, 1 capital
              letter and 1 special character</span>
          </div>
          <button type="submit" class="submit" id="regbtn1">Update Password</button>
          <input type="hidden" name="action" value="updatePassword">
          <input type="hidden" name="clientId" value="
            <?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
            elseif(isset($clientId)){ echo $clientId; } ?>
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
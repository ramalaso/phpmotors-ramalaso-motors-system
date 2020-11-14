<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link rel='stylesheet' href='/css/style.css' media='screen' />
  <link rel='stylesheet' href='../css/styleLogin.css' media='screen' />
  <title>PHP Motors</title>
</head>

<body>
  <div class='container'>
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/header.php'?>
    </header>
    <nav>
      <?php echo $navList; ?>
    </nav>
    <main>
      <h1>Administration view</h1>
      <div class='containerLogin'>
        <form id='form' class='form'>
        <h4 class="logged">You are logged in</h4>
          <h4>First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></h4>
          <h4>Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></h4>
          <h4>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></h4>        
          <?php if (isset($_SESSION['message'])) {
               echo "<small>".$_SESSION['message']."</small>";
            } ?>
           <hr>
          <h2>Account Management</h2>
          <h4>Use this link to update account information</h4>
          <?php 
              echo "
              <a href='/accounts?action=mod&id=".$_SESSION['clientData']['clientId']."' class='create'>Update Account Information</a>
            " ;
          ?>
          <hr>
          
          <?php 
          if($_SESSION['clientData']['clientLevel']>1) {
              echo "
              <h2>Inventory Management</h2>
              <h4>Use this link to manage the inventory</h4>
              <a href='../vehicles/index.php?action=vehicle' class='create'>Vehicle Management</a>
            " ;
          }
          ?>
        </form>
      </div>
    </main>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?>
  </footer>
  </div>
</body>

</html>
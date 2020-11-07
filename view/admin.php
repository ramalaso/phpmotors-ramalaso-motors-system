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
      <h2>Administration view</h2>
      <div class='containerLogin'>
        <form id='form' class='form'>
          <h1><?php echo $_SESSION['clientData']['clientFirstname']." ".$_SESSION['clientData']['clientLastname']; ?></h1>
          <h3>You are logged in</h3>
          <h3>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></h3>
          <h3>Client Level:<?php echo $_SESSION['clientData']['clientLevel']; ?> </h3>
          <?php 
          if($_SESSION['clientData']['clientLevel']>1) {
              echo "
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
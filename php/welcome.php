<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
      <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">

    <link rel="stylesheet" href="../css/style.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">
    </head>
    <body class="img js-fullheight" style="background-image: url(../images/bg.jpg);">
    <div id="login">
        <h3 class="heading-section">CINETICS</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <h1 class="text-center text-info">BENVINGUT A CINETICS <?php echo $_SESSION['email'];?></h1>
                        <br><a href="logout.php" class="tornar"><b>LOGOUT</b></a>
            </div>
        </div>
    </div>
    </body>
</html>
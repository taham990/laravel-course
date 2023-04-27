<!-- php codes -->
<!-- session -->
<div class="contain">
<?php
if(session_status() === PHP_SESSION_NONE) session_start();
?>




<!-- Html codes -->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="my.css">
    <title>Plot Listing HTML5 Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

<body>


  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
          <div class="">
            <?php
                if(isset($_SESSION['FlashMessage']))
                {
                    echo "$_SESSION[FlashMessage]";
                    unset($_SESSION['FlashMessage']);
                }
            ?>
            <br><br>
            <a href="index.php"> بازگشت به صفحه اصلی </a>


          </div>
        </div>
      </div>
    </div>
  </div>

</body>
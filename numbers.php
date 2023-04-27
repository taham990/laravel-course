<?php
define("WORKSPACE" , "/example01/");
define("ROOT" ,  $_SERVER["DOCUMENT_ROOT"].WORKSPACE);
if(session_status() === PHP_SESSION_NONE) session_start();
include "connection.php";


if($_SERVER['REQUEST_METHOD'] === 'POST')
 {
   $_SESSION['SearchText'] = $_POST['searchText'];
   
 } 
/////////////////////////////////////////////////////////////////////
?>
<!-- //////////////////////////////////////////////////////////////////////// -->

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
<?php
if(!(isset($_SESSION['isLogined'])and($_SESSION['isLogined'] === true)))
{
    $_SESSION['flashMessage'] = "ابتدا باید وارد شوید";
    header("location: ".WORKSPACE."login.php");
}


$sqlNumber = "SELECT * FROM `users` WHERE `users`.`UserName` = '$_SESSION[SearchText]'";
$dosql =$link->query($sqlNumber);
$finalsql = $dosql->fetch_assoc();
if(isset($finalsql['UserName'])){
     if($finalsql['UserName'] == $_SESSION['SearchText'])
     {
  
        if(!(empty($finalsql['UserNumber'])))
        {
            $FinalNumber =  "0" . $finalsql['UserNumber'];
        }
        else
        {
            $FinalNumber = '';
        }
        }
    }
        if(empty($finalsql['UserNumber']))
        {
        $NullError =  "چنین کاربری وجود ندارد";
        }

?>

  
 <?php
 
 
 ?>
    
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
          <div class="">
             <h3>  به دنبال شخص دیگری هستید؟</h3>
             <br><br>
              <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
              <input type="text" class="" placeholder="Search.." name="searchText">
              <button type="submit" ><i class="fa fa-search"></i></button>
              </form> 
            </div>
            <br><br>
            <?php
            if((isset($FinalNumber)))
            {
            echo "<h3>شماره مشترک مورد نظر شما   </h3>";
             echo  $FinalNumber ;
            }
            else
            {
                $FinalNumber ='';
                echo  $NullError;
            }
            ?>
            <br><br>
            <a href="index.php" style="color:White;">بازگشت به صفحه اصلی </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>

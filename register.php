<?php
 define("WORKSPACE" , "/example01/");
 define("ROOT" ,  $_SERVER["DOCUMENT_ROOT"].WORKSPACE);
 include "connection.php";
?>
<?php
// connection start

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "fohaz";
    
    // Create connection
    $link = mysqli_connect($servername, $username, $password , $db);

    // Check connection
    if (!$link) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $link->query("set NAMES utf8");
    $link->query("set CHARACTER SET utf8");
  
// connection ends


if (session_status() === PHP_SESSION_NONE) session_start();

$UserNameError = $NumberError = $NameError = $LastNameError = $PasswordError = $ConfirmError = $ConfirmError2 ='';
$flag = false;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(strlen($_POST['UserName']) < 2 or strlen($_POST['UserName']) == 0 )
    {
        $UserNameError = "نام کاربری معتبر نیست";
        $flag = true;
    }
    if(strlen($_POST['Number']) > 11 or strlen($_POST['Number']) < 11)
    {
        $NumberError = "لطفا یک شماره تلفن معتبر وارد نمایید مثلا 0990 880 1459";
        $flag = true;
    }
    if(strlen($_POST['Name']) < 2)
    {
        $NameError = "لطفا یک نام معتبر وارد نمایید";
        $flag = true;
    }
    if(strlen($_POST['LastName']) < 2)
    {
        $LastNameError = "لطفا یک نام خانوادگی معتبر وارد نمایید";
        $flag = true;
    }
    if(strlen($_POST['Password']) < 3)
    {
        $PasswordError = "گذرواژه باید حداقل 4 حرف باشد";
        $flag = true;
    } 
    if(strlen($_POST['Confirm']) < 3)
    {
        $ConfirmError = "گذروازه معتبر نمیباشد";
        $flag = true;
    }
    if(strcmp($_POST['Password'] , $_POST['Confirm']) != 0)
    {
        $ConfirmError2 = "گذرواژه های وارد شده تطابق ندارند";
        $flag = true;
    }
    if(!$flag)
    {
       // $HashedPassword = md5($_POST['Password']);
        $_SESSION['RejisterTrue'] = true;
        $sql = "INSERT INTO `users` (`UserName`,`UserNumber`, `Password`, `Name` , `LastName`) VALUES ( '$_POST[UserName]','$_POST[Number]', '$_POST[Password]', '$_POST[Name]' , '$_POST[LastName]')";
        //$sqlUpdate = "UPDATE `users` SET `Role_ID` = 1 WHERE `users`.`RoleID` = null";
        //$link->query($sql);
        //$link->query($sql);
        if($link->query($sql) === true)
        {
            $_SESSION['FlashMessage'] = "ثبت نام با موفقیت انجام شد ";
            $_SESSION['RejisterTrue'] = true;
            header("location: ".WORKSPACE."index.php");
            
        }
    }

}


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
    <link rel="stylesheet" href="/my.css">
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



?>

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
          <div class="">
                    <!-- form html -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div>
                    <label for="UserName"> نام کاربری </label>
                    <br>
                    <input type="text" name="UserName" value="<?php echo isset($_POST['UserName']) ? $_POST['UserName'] : '';?>">
                    <br>
                    <span  style="color:red"><?php echo $UserNameError ;?></span>
                </div>
                <div>
                    <label for="Number"> شماره تلفن همراه </label>
                    <br>
                    <input type="Number" name="Number" value="<?php echo isset($_POST['Number']) ? $_POST['Number'] : '';?>">
                    <br>
                    <span  style="color:red"><?php echo $NumberError ;?></span>
                </div>
                <div>
                    <label for="Name"> نام </label>
                    <br>
                    <input type="text" name="Name" value="<?php echo isset($_POST['Name']) ? $_POST['Name'] : '';?>">
                    <br>
                    <span  style="color:red"><?php echo $NameError ;?></span>
                </div>
                <div>
                    <label for="LastName"> نام خانوادگی </label>
                    <br>
                    <input type="text" name="LastName" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : '';?>">
                    <br>
                    <span  style="color:red"><?php echo $LastNameError ;?></span>
                </div>
                <div>
                    <label for="Password">گذرواژه  </label>
                    <br>
                    <input type="password" name="Password" >
                    <br>
                    <span  style="color:red"><?php echo $PasswordError ;?></span>
                </div>
                <div>
                    <label for="Confirm">تایید گذرواژه </label>
                    <br>
                    <input type="Password" name="Confirm">
                    <br>
                    <span  style="color:red"><?php echo $ConfirmError ;echo $ConfirmError2;?></span>
                </div>
                <br>
                <div>
                <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
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
<?php

define("WORKSPACE" , "/example01/");
define("ROOT" ,  $_SERVER["DOCUMENT_ROOT"].WORKSPACE);
if (session_status() === PHP_SESSION_NONE) session_start();
include "connection.php";



if(!(isset($_SESSION['isLogined']) and $_SESSION['isLogined'] === true))
{
    header("location: ".WORKSPACE."login.php");
    $_SESSION['flashMessage'] = "ابتدا وارد شوید";
}

$UserNameError = $NumberError = $NameError = $LastNameError = $PasswordError = $ConfirmError = $ConfirmError2 =$NewPasswordError =$PasswordError2 = '';
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
        $LaseName = "لطفا یک نام خانوادگی معتبر وارد نمایید";
        $flag = true;
    }
    if(strlen($_POST['Password']) < 3)
    {
        $PasswordError = "گذرواژه باید حداقل 4 حرف باشد";
        $flag = true;
    } 
    if(strlen($_POST['NewPassword']) < 3)
    {
        $NewPasswordError = "گذرواژه باید حداقل 4 حرف باشد";
        $flag = true;
    } 
    

    if(!$flag)
    {
        $sqlsql = "SELECT `UserName`,`UserNumber`,`Name`,`LastName`,`Password` FROM `users` WHERE `users`.`UserName` = '$_SESSION[UserNameChange]'";
        $myresult = $link->query($sqlsql);
        $values = $myresult->fetch_assoc();
       // $HashedPassword = md5($_POST['Password']);

        $sql = "UPDATE `users` SET `UserName` = '$_POST[UserName]' ,`UserNumber` = '$_POST[Number]' ,`Name` = '$_POST[Name]' ,
        `LastName` = '$_POST[LastName]',`Password` = $_POST[NewPassword] WHERE `users`.`Password` = $_POST[Password]";
         //$rrr = $link->query($sql);
        if($link->query($sql) === true and $_POST['Password'] === $values['Password'])
        {
            $_SESSION['FlashMessage'] = "تغییرات با موفقیت انجام شد ";
            header("location: ".WORKSPACE."message.php");
            
        }
        else{
            $PasswordError2 = "گذرواژه وارد شده معتبر نیست";
        }
    }

}
$sqlsql = "SELECT `UserName`,`UserNumber`,`Name`,`LastName`,`Password` FROM `users` WHERE `users`.`UserName` = '$_SESSION[UserNameChange]'";
$myresult = $link->query($sqlsql);
$values = $myresult->fetch_assoc();

// if($_POST['Password'] == $values['Password'])
// {
//     $PasswordError2 = "گذرواژه وارد شده معتبر نیست";
// }
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
                <!-- form html -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div>
                <label for="UserName"> نام کاربری </label>
                <br>
                <input type="text" name="UserName" value="<?php echo  $values['UserName'];?>">
                <br>
                <span style="color:red"><?php echo $UserNameError ;?></span>
            </div>
            <div>
                <label for="Number"> شماره تلفن همراه </label>
                <br>
                <input type="Number" name="Number" value="<?php echo "0". $values['UserNumber'];?>">
                <br>
                <span style="color:red"><?php echo $NumberError ;?></span>
            </div>
            <div>
                <label for="Name"> نام </label>
                <br>
                <input type="text" name="Name" value="<?php echo  $values['Name'];?>">
                <br>    
                <span style="color:red"><?php echo $NameError ;?></span>
            </div>
            <div>
                <label for="LastName"> نام خانوادگی </label>
                <br>
                <input type="text" name="LastName" value="<?php echo  $values['LastName'];?>">
                <br><br>
                <span style="color:red"><?php echo $LastNameError ;?></span>
            </div>
            <div>
                    <label for="Password" name="Password">گذرواژه اصلی </label>
                    <br>
                    <input type="Password" name="Password">
                    <br>
                    <span  style="color:red"><?php echo isset($PasswordError) ?  $PasswordError : '' ;?></span>
                    <span  style="color:red"><?php echo isset($PasswordError2) ?  $PasswordError2 : '' ;?></span>
            </div>
            <div>
                    <label for="NewPassword" name="NewPassword">گذرواژه جدید </label>
                    <br>
                    <input type="Password" name="NewPassword" >
                    <br>
                    <span  style="color:red"><?php echo isset($NewPasswordError) ?  $NewPasswordError : '' ;?></span>
            </div>

            <div>
            <button type="submit">ثبت</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

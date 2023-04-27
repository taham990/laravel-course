<?php
 define("WORKSPACE" , "/example01/");
 define("ROOT" ,  $_SERVER["DOCUMENT_ROOT"].WORKSPACE);
?>
<?php
include "connection.php";
if(session_status() === PHP_SESSION_NONE) session_start();

if(isset($_SESSION['isLogined']) and $_SESSION['isLogined'] === true)
{
    header("location:index.php");
}


$ErrorMessage = '';
if($_SERVER['REQUEST_METHOD'] == "POST")
{



    // validation form //
    $flag = false ;
    if(empty($_POST['UserName']))
    {
        $UserNameError = "پر کردن این فیلد اجبای است";
        $flag = true;
    }
     if((strlen($_POST['Number']) < 11) or (strlen($_POST['Number']) > 11))
     {
        $NumberError = "شماره وارد شده صحیح نمیباشد ";
     }
    if(strlen($_POST['Password']) < 3)
    {
        $PasswordError = "گذرواژه وارد شده صحیح نمیباشد ";
    }



  
    if(!$flag)
    {
    $sql = "SELECT * from `users` where `users`.`Password` = '$_POST[Password]'  and `users`.`UserName` = '$_POST[UserName]';";
    $result = $link->query($sql);
    // and ($result->num_rows > 0)
    if(($result) and ($result->num_rows > 0))
    {
        $_SESSION['isLogined'] = true;
        $info = $result->fetch_assoc();

        // permission fileds//

        $query = "SELECT users.UserName, roles.RoleName, permission.PermissionName
        FROM (roles INNER JOIN (permission INNER JOIN role_per
        ON permission.PermissionID = role_per.PermissionID) 
        ON roles.RoleID = role_per.RoleID)  
        INNER JOIN users ON roles.RoleID = users.Role_ID where 
        users.UserName = '$info[UserName]';";

        $resultPermission = $link->query($query);
        $count = mysqli_num_rows($resultPermission);
        $permisions=[];
        for($i=0;$i<=$count;$i++)
        {
            
        }
        //session fildes//
        $_SESSION['User'] = ["UserName" => $info['UserName'] , "Number" => $info['Number'] ,
         "Password" => $info['Password'] , "Permission" => $Permissions];
         $m = $info['UserName'];
         $_SESSION['UserNameChange'] =  $m;
        header("location: ".WORKSPACE."index.php"); 
    }
    else
    {
        $ErrorMessage = "نام کاربری یا گذرواژه اشتباه است ";
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



?>

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
          <div class="">

         <!-- form -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                <div>
                    <span> <?php echo $ErrorMessage ;?></span>
                    <br>
                    <span style="color:red"> <?php echo isset($_SESSION['flashMessage']) ? $_SESSION['flashMessage'] : '';
                    unset($_SESSION['flashMessage']);?></span>
                    <br><br>
                    <label for="UserName">نام کاربری</label>
                    <input type="text" name="UserName">
                    <br>
                    <span style="color:red"><?php echo isset($UserNameError) ?  $UserNameError : '' ;?></span>
                </div>
                <br><br>
                <div>
                    <label for="Number" name="Number">شماره تلفن</label>
                    <input type="Number" name="Number">
                    <br>
                    <span style="color:red"><?php echo isset($NumberError) ?  $NumberError : '' ;?></span>
                </div> 
                <br><br>
                <div>
                    <label for="Password" name="Password">گذرواژه</label>
                    <input type="Password" name="Password">
                    <br>
                    <span style="color:red"><?php echo isset($PasswordError) ?  $PasswordError : '' ;?></span>
                </div>
                <br><br>
                <div>
                    <button type="submit">ورود</button>
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
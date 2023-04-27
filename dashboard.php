<!-- if codes -->
<?php
$o = true;
if($o == true)
{
?>
<?php  
if(session_status() === PHP_SESSION_NONE) session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $_SESSION['SearchText'] = $_POST['searchText'];
  header("location:Numbers.php");
} 

?>

<!-- ***** Header Area Start ***** -->
 <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">

            <!-- ***** Menu Start ***** -->
            
            <ul class="nav">
              <li><a href="index.php" class="">خانه</a></li>
              <?php if(isset($_SESSION['isLogined']) and $_SESSION['isLogined'] === true) { ?>
              <li><a href="logout.php">خروج از حساب کاربری</a></li>
              <li><a href="change.php">ویرایش اطلاعات </a></li>
              <?php } ?>
              <?php if(!(isset($_SESSION['isLogined']) and $_SESSION['isLogined'] === true)){ ?>
              <li><a href="register.php">ثبت نام</a></li>
              <?php } ?>
              <!-- <li><a href="php/admin.php">مدیریت</a></li> -->
              <?php if(!(isset($_SESSION['isLogined']) and $_SESSION['isLogined'] === true)) { ?>
              <li><div class="main-white-button"><a href="login.php" ><i class="fa fa-plus" ></i> ورود </a></div></li> 
              <?php }?>
            </ul>        
            <!-- start search bar -->
            <?php if(isset($_SESSION['isLogined']) and $_SESSION['isLogined'] === true) { ?>
            <div class="">
              <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
              <input type="text" class="" placeholder="Search.." name="searchText">
              <button type="submit" ><i class="fa fa-search"></i></button>
              </form> 
            </div>
            <?php } ?>
            <!-- end search bar -->
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
<?php
}?>










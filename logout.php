<?php

define("WORKSPACE" , "/example01/");
define("ROOT" ,  $_SERVER["DOCUMENT_ROOT"].WORKSPACE);

if(session_status() === PHP_SESSION_NONE) session_start();

if(isset($_SESSION['isLogined']) and ($_SESSION['isLogined'] === true))
{
session_destroy();
session_unset();
header("location:index.php");

}
else{
header("location:index.php");
}
?>

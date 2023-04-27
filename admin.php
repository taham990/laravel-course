<?php
 define("WORKSPACE" , "/example01/");
 define("ROOT" ,  $_SERVER["DOCUMENT_ROOT"].WORKSPACE);
?>


<?php
include "connection.php";
if(session_status() === PHP_SESSION_NONE) session_start();

if(!(($_SESSION['isLogined']) and ($_SESSION['isLogined'] == true)))
{
    header("location :".WORKSPACE."login.php");
    $_SESSION['flashMessage'] ="ابتدا وارد شوید ";
}
// check have permission //
//CheckPermission('management',$_SESSION['User']['Permissions'])
// die(print_r($_SESSION['User']['Permissions']));
$management = "management";
if($_SESSION['User']['Permission'] == 'management')
{
//change role //
echo "تغییر نقش کاربران ";
echo "<br><br>";
//UserNameSelection //
$sql1 = "select * from users where users.UserName <> 'mohammad123'";
$UserNamesResult = $link->query($sql1);
$count1 = mysqli_num_rows($UserNamesResult);
echo "<label for=UserName>نام کاربری </label>";
echo "<br>";
echo "<select>";
for($i=0;$i<=$count1;$i++)
{
 
    $User = $UserNamesResult->fetch_assoc();
    echo" <option value='$User[UserID]'>" . $User['UserName'] . "</option>";
 
}
echo "</select>";
//RoleNameSelection//
$sql2 = "select * from roles where roles.RoleID <> 3";
$RolesResult = $link->query($sql2);
$count2 = mysqli_num_rows($RolesResult);
echo "<br><br>";
echo "<label for=RoleName>نقش کاربر </label>";
echo "<br>";
echo "<select>";
for($b=0;$b<=$count2;$b++)
{
     
    $Roles = $RolesResult->fetch_assoc();
    echo" <option value='$Roles[RoleID]'>" . $Roles['RoleName'] . "</option>";
}
echo "</select>";
echo "<br><br>";
//UPDATE `users` SET `Role_ID` = '2' WHERE `users`.`UserID` = 34;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //echo $Roles['RoleName'] ;
    //echo $User['UserName'];
    
    
    $sql3 = "UPDATE `users` SET `Role_ID` = '' WHERE `users`.`UserName` = ''";
    $resultsql3 = $link->query($sql3);
    echo "تغییر نقش با موفقیت انجام شد ";
}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
    <input type=submit value= ثبت >
</form>
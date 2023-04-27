<?php
function CheckPermission($permission , $permissionList)
{
    
    // foreach($permissionList as $item)
    // {
    //   if ($item === $permission ) {
    //     $flag = true;
    //     break;
    //   }
    // }
    // return $flag;
      for($i=0;$i<=1000;$i++)
      {
        for($a=0;$a<=1000;$a++)
        {
        
          if($permissionList[$i][$a] == $permission)
          {
            $flag =true;
            break;
          }
          else
          {
            $flag =false;
            break;
          }
        }
      }
      return $flag;

}


?>
<?php
$arrayb = [];
function checkall($arrayb , $item)
{

  $flag = false;
  for($i=0;$i<sizeof($arrayb);$i++)
  {
    if($arrayb[$i] == $item)
    {
      $flag = true;
      break;
    }
    return $flag;
  }
}

?>
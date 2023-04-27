<?php
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
  
?>
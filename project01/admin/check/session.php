<?php session_start();
include('../../connect.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
 	if($level!='admin'){
    Header("Location: ../Login/logout.php");  
  }  
?>
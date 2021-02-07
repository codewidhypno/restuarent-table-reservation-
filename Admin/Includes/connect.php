<?php 
$con = mysqli_connect("localhost","root","","tablebooking");

if (!$con)
{
  die();
}

mysqli_select_db($con,"tablebooking");
?>
<?php
session_start();
include('config.php');

$id=$_GET['id'];

$sql1="UPDATE users SET approval_status = 'ACCEPTED' where Id = '$id';";
if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Approved')</script>";
header( "Refresh:0.01; url=users.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}





?>
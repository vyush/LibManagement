<?php
session_start();
include('config.php');

$id=$_GET['id'];
echo "$id";
$sql1="UPDATE recommendations SET Completed = 'DONE' where recommend_id = '$id';";
if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Approved')</script>";
header( "Refresh:0.01; url=recommendations.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}





?>
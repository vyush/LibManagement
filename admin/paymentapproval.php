<?php
session_start();
include('config.php');

$id=$_GET['id'];
$sql = "SELECT * FROM payment WHERE pay_id = '$id';";
$user_query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($user_query);
$status = $row['status'];
if($status == "NOT APPROVED")
{
    $sql1="UPDATE payment SET status = 'APPROVED'where pay_id = '$id';";
    if($conn->query($sql1) === TRUE){
        echo "<script type='text/javascript'>alert('Approved')</script>";
        header( "Refresh:0.01; url=Payments.php", true, 303);
        }
        else
        {//echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
        header( "Refresh:0.01; url=Payments.php", true, 303);
        }
}
?>
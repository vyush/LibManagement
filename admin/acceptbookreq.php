<?php
session_start();
include('config.php');

$id=$_GET['id'];
$sql = "SELECT * FROM transaction WHERE trans_id = '$id';";
$user_query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($user_query);
$status = $row['return_status'];
if($status == "NOT ACCEPTED")
{
    $sql1="UPDATE transaction SET return_status = 'ACCEPTED',borrow_date = CURDATE(),return__date = ADDDATE(CURDATE(),INTERVAL 14 DAY) where trans_id = '$id';";
    if($conn->query($sql1) === TRUE){
        echo "<script type='text/javascript'>alert('Approved')</script>";
        header( "Refresh:0.01; url=users.php", true, 303);
        }
        else
        {//echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
        }
}
elseif($status == "RETURN NACCEPTED")
{
    $sql1="UPDATE transaction SET return_status = 'RETURNED',return_date = CURDATE() where trans_id = '$id';";
    if($conn->query($sql1) === TRUE){
        echo "<script type='text/javascript'>alert('Approved')</script>";
        header( "Refresh:0.01; url=users.php", true, 303);
        }
        else
        {//echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
        }
}
?>
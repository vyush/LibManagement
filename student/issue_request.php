<?php
session_start();
include('config.php');

$id=$_GET['id'];

$username=$_SESSION['username'];
$user_query=mysqli_query($conn,"select id from users where username = '$username'");
$row11=mysqli_fetch_array($user_query);
$uid = $row11['id'];


$sql="SELECT `book_id` FROM transaction where (book_id = '$id' AND user_id= '$uid' AND (return_status = 'NOT RETURNED' OR return_status = 'NOT ACCEPTED' OR return_status = 'RETURN NACCEPTED'))";
$borrow_details = mysqli_query($conn,$sql);
$row11 = mysqli_fetch_array($borrow_details);
$count = mysqli_num_rows($borrow_details);
if($count == 0)
{
    $sql="INSERT INTO `transaction`(`book_id`, `user_id`, `return_status`, `borrow_date`, `return_date`) VALUES ('$id','$uid','NOT ACCEPTED',CURDATE(),ADDDATE(CURDATE(),INTERVAL 14 DAY))";

    $conn->query($sql);
    echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Issue Request Already Sent or You Already Have The Book.')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);
}




?>
<?php
require('config.php');
session_start();
$book_id=$_GET['id'];

$username=$_SESSION['username'];
$user_query=mysqli_query($conn,"select id from users where username = '$username'");
$row11=mysqli_fetch_array($user_query);
$uid = $row11['id'];

$sql="SELECT * FROM transaction where (book_id = '$book_id' AND user_id= '$uid' AND (return_status = 'NOT RETURNED'))";
$borrow_details = mysqli_query($conn,$sql);
$row11 = mysqli_fetch_array($borrow_details);
$date = $row11['return_date'];
$renews = $row11['Renews'] + 1;

$sql="UPDATE transaction SET Renews = '$renews', return_date = DATE_ADD('$date',INTERVAL 14 DAY) WHERE (book_id = '$book_id' AND user_id= '$uid' AND (return_status = 'NOT RETURNED'))";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Renewed.')</script>";
header( "Refresh:0.01; url=current.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Unkown Error')</script>";
    header( "Refresh:0.01; url=current.php", true, 303);

}
?>
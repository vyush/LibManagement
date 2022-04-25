<?php
session_start();
include('config.php');

$id=$_GET['id'];

$username=$_SESSION['username'];
$user_query=mysqli_query($conn,"select id from users where username = '$username'");
$row11=mysqli_fetch_array($user_query);
$uid = $row11['id'];


$sql="SELECT `book_id` FROM transaction where (book_id = '$id' AND user_id= '$uid' AND return_status = 'NOT RETURNED')";
$borrow_details = mysqli_query($conn,$sql);
$row11 = mysqli_fetch_array($borrow_details);
$count = mysqli_num_rows($borrow_details);
if($count == 1)
{
    $sql="UPDATE transaction SET return_status = 'RETURN NACCEPTED',return_date=CURDATE() WHERE (book_id = '$id' AND user_id= '$uid' AND return_status = 'NOT RETURNED');";

    if($conn->query($sql) === TRUE)
    {
        echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
        header( "Refresh:0.01; url=book.php", true, 303);
    }
    else
    {
        echo "<script type='text/javascript'>alert('Unknown Error Occured')</script>";
        header( "Refresh:0.01; url=books.php", true, 303);
    }
    
}
else
{
	echo "<script type='text/javascript'>alert('Return Request Already Sent')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);
}

?>
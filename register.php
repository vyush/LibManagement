<?php 

include 'config.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

if (isset($_POST['submit'])) {
    // echo "<script type='text/javascript'>alert('Password Not Matched.')</script>";
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$status = "HOLD";
	$role = "Student";
	if($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$sql1 = "SELECT * FROM users WHERE username='$username'";
		$result1 = mysqli_query($conn, $sql1);
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows == 0 && $result1->num_rows == 0) {
			$sql = "INSERT INTO users (name,username, email, password,role,approval_status)
					VALUES ('$name','$username', '$email', '$password','$role','$status')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.');window.location.href='index.php'</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                // header("Location: index.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
                $username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			}
		} else {
			echo "<script>alert('Woops! Email or Username Already Exists.')</script>";
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";

		}
		
	} else {
		echo "<script type='text/javascript'>alert('Password Not Matched.');</script>";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - EzLib</title>
</head>
<body>
	<div class="container">
		<form action = "" method = "POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Name" name="name" value = "<?php echo $name; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value = "<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value = "<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value = "<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name = "cpassword" value = "<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name = "submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <?php
     if($_GET){
        echo $_GET['auth']; //print_r($_GET); //remember to add semicolon      
    }else{
      echo "Url has no user";
    }
    ?>
    <a href="logout.php">Logout</a>
</body>
</html>
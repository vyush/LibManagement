<?php
session_start();
include '../config.php';
if (!isset($_SESSION['username']) || $_SESSION['role'] != "Student") {

    echo "<script type='text/javascript'>alert('You are not logged in')</script>";
    header("Location: ../index.php");
    
}
?>
<?php
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $sql="SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row=$result->fetch_assoc();

        $name=$row['name'];
        $email=$row['email'];
        $username=$row['username'];
        $role=$row['role'];
        $pswd1=$row['password'];
        $status = $row['approval_status'];
        $path = $row['image_path'];
    ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <title>EzLib</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link type="text/css" href="bootstrap/css/DT_bootstrap.css" rel="stylesheet" />
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
        <link type="text/css" href="css/theme.css" rel="stylesheet"/>
        <link href="css/docs.css" rel="stylesheet" media="screen">
		<!-- <link href="css/diapo.css" rel="stylesheet" media="screen"> -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <link href="css/font-awesome.css" rel="stylesheet" media="screen">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet"/>
        
        <link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'/>

        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.hoverdir.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script> 
			
        <noscript>
                <style>
                    .da-thumbs li a div {
                        top: 0px;
                        left: -100%;
                        -webkit-transition: all 0.3s ease;
                        -moz-transition: all 0.3s ease-in-out;
                        -o-transition: all 0.3s ease-in-out;
                        -ms-transition: all 0.3s ease-in-out;
                        transition: all 0.3s ease-in-out;
                    }
                    .da-thumbs li a:hover div{
                        left: 0px;
                    }
                </style>
            </noscript>
    </head>
    <body>
        <div class="navbar navbar-fixed-top nav-wrapper" style = "background-color: #6c5ce7;">
            <div class="navbar-inner" style = "background-color: #6c5ce7;">
                <div class="container">
                <ul class="nav pull-left">
                    <a class="brand" href="index.php" style="color: #fff;">EzLib </a>
                </ul>
                
                    
                        <div></br></div>
                        <ul class="nav pull-right">
                            <a href = "index.php">
                                <img src="<?php echo $path;?>" class="nav-avatar" width = 32 height = 32  /></a>
                            </li>
                        </ul>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container" style = "width:1500px">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="history.php"><i class="menu-icon icon-tasks"></i>Previously Borrowed Books </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Recommend Books </a></li>
                                <li><a href="makepayment.php"><i class="menu-icon icon-inbox"></i>Make Payment</a>
                                <li><a href="pay_done.php"><i class="menu-icon icon-inbox"></i>Payments Done</a>
                                </li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
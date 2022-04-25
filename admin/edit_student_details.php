<?php
ob_start();
include 'header.php';
?>

                    <div class="span9">
                        <div class="module">
                            <div class="module-head" style = "background-color:#6c5ce7;">
                                <h3 style="color: #f0f0f0;">Update Details</h3>
                            </div>
                            <div class="module-body">


                                    
                    			
                                <form class="form-horizontal row-fluid" action="edit_student_details.php?id=<?php echo $username ?>" method="post" enctype="multipart/form-data">

                                <div class="control-group">
                                        <label class="control-label" for="Name"><b>Name:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="Username"><b>Username:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Username" name="Username" value= "<?php echo $username?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                                        <div class="controls">
                                            <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="role"><b>Role:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Role" name="Role" value= "<?php echo $role ?>" class="span8" required readonly>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Password"><b>New Password:</b></label>
                                        <div class="controls">
                                            <input type="password" id="Password" name="Password"  value= "<?php echo "$pswd1"?>" class="span8" required>
                                        </div>
                                    </div>   
                                    <div class="control-group">
                                        <label class="control-label" for="image"><b>Profile Picture:</b></label>
                                        <div class="controls">
                                            <input type="file" id="image" name="image" class="span8">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn" style = "background-color: #a29bfe;color:#fff" ><center>Update Details</center></button>
                                            </div>
                                    </div>
                                                                                                         

                                </form>
                    		           
                        </div>
                        </div> 	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
            <div>
                </br></br></br></br></br></br></br></br></br>
            </div>
        </div>
       
        <?php include 'footer.php'?>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['Name'];
    $email=$_POST['EmailId'];
    $role=$_POST['Role'];
    $username = $_POST['Username'];
    $pswd = $_POST['Password'];
    $user_id = $_SESSION['id'];
    // echo "<script type='text/javascript'>alert('$name')</script>";
    $sql = "SELECT * FROM users WHERE email='$email' and Id != '$user_id'";
    $sql1 = "SELECT * FROM users WHERE username='$username' and Id != '$user_id'";
    $result1 = mysqli_query($conn, $sql1);
    $result = mysqli_query($conn, $sql);
    // echo $result->num_rows;
    if ($result->num_rows == 0) {
        if($result1->num_rows == 0){
            if($pswd1 != $pswd)
            $pswd=md5($pswd);
            else
            $pswd=$pswd;
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_size = $_FILES['image']['size'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
                // echo "<script type='text/javascript'>alert('$img_size')</script>";
            }
            if($img_size === 0)
            {
                // echo "<script type='text/javascript'>alert('$img_size')</script>";
                // $xx = $_FILES['image'];
                $sql1="UPDATE users SET  name = '$name',username = '$username', email = '$email', role = '$role', password='$pswd' where Id='$user_id'";
                if($conn->query($sql1) === TRUE){
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                echo "<script type='text/javascript'>alert('Success')</script>";
                header( "Refresh:0.01; url=index.php", true, 303);
                }
                else
                {//echo $conn->error;
                echo "<script type='text/javascript'>alert('Error')</script>";
                }
            }
            else
            {
                
                if ($error === 0) {
                    if ($img_size > 625000) {
                        $em = "Sorry, your file is too large.";
                        echo "<script type='text/javascript'>alert('$em')</script>";
                        header("Location: edit_student_details.php?error=$em");
                    }else{
                        
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("jpg", "jpeg", "png");

                        if (in_array($img_ex_lc, $allowed_exs)) {
                            
                            // $new_img_name = uniqid("IMG-", true);
                            $new_img_name = "IMG-".$username.'.'.$img_ex_lc;
                            // .'.'.$img_ex_lc;
                            $img_upload_path = 'uploads/'.$new_img_name;
                            // echo "<script type='text/javascript'>alert('$new_img_name')</script>";
                            move_uploaded_file($tmp_name, $img_upload_path);
                            $sql="UPDATE users SET  name = '$name', email = '$email', role = '$role', password='$pswd' ,image_path='$img_upload_path' where username='$username'";
                            if($conn->query($sql) === TRUE){
                                echo "<script type='text/javascript'>alert('Success')</script>";
                                header( "Refresh:0.01; url=index.php", true, 303);
                                }
                                else
                                {//echo $conn->error;
                                echo "<script type='text/javascript'>alert('Error')</script>";
                                }
                        }else {
                            $em = "You can't upload files of this type";
                            echo "<script type='text/javascript'>alert('$em')</script>";
                            header("Location: edit_student_details.php.php?error=$em");
                        }
                    }
                }else {
                    $em = "unknown error occurred!";
                    echo "<script type='text/javascript'>alert('$em')</script>";
                    header("Location: index.php?error=$em");
                }
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Username not available.')</script>";
            header( "Refresh:0.01; url=edit_student_details.php?error=Username not available.", true, 303);
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('email address already used')</script>";
        header( "Refresh:0.01; url=edit_student_details.php?error=email address already used", true, 303);
    }
}
?>
      
    </body>

</html>
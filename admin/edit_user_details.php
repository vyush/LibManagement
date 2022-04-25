<?php
ob_start();
include 'header.php';?>


                    <div class="span12">
                        <div class="module">
                            <div class="module-head" style = "background-color:#6c5ce7;">
                                <h3 style="color: #f0f0f0;">Update Details</h3>
                            </div>
                            <div class="module-body">


                            <?php
$id = $_GET['id'];
$user_query=mysqli_query($conn,"SELECT * FROM users WHERE Id = '$id';");
$row=mysqli_fetch_array($user_query);
$name = $row['name']; 
$username = $row['username'];
$email = $row['email'];
$status=$row['approval_status']; 
$role = $row['role'];
$path = "../student/".$row['image_path'];
?>
                    			
                                <form class="form-horizontal row-fluid" action="edit_user_details.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                        <label class="control-label" for="Id"><b>User Id.:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Id" name="Id"  value= "<?php echo "$id"?>" class="span8" required readonly>
                                        </div>
                                    </div>
                                <div class="control-group">
                                        <label class="control-label" for="Name"><b>Name:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                                        <div class="controls">
                                            <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Role"><b>Role:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Role" name="Role" value= "<?php echo $role ?>" class="span8" required readonly>
                                        </div>
</br>
                                    </div>

                                    <!-- <div class="control-group">
                                        <label class="control-label" for="Password"><b>New Password:</b></label>
                                        <div class="controls">
                                            <input type="password" id="Password" name="Password"  value= "<?php echo "$pswd1"?>" class="span8" required>
                                        </div>
                                    </div>    -->
                                    <!-- <div class="control-group">
                                        <label class="control-label" for="image"><b>Profile Picture:</b></label>
                                        <div class="controls">
                                            <input type="file" id="image" name="image" class="span8">
                                        </div>
                                    </div> -->
<center>
                                    <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" id="submit" name="submit"class="btn btn-primary span8" style="width:20%" ><center>Update Details</center></button>
                                            </div>
                                    </div>
</center>                                                                

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
        <!-- <?php echo "<script type='text/javascript'>alert('$id')</script>";?> -->
<?php
if(isset($_POST['submit']))
{
    
    $name = $_POST['Name'];
    $email=$_POST['EmailId'];
    // echo "<script type='text/javascript'>alert('$name')</script>";
    $sql1="UPDATE users SET name = '$name', email = '$email' where Id = '$id';";
    if($conn->query($sql1) === TRUE){
    echo "<script type='text/javascript'>alert('Success')</script>";
    header( "Refresh:0.01; url=users.php", true, 303);
    }
    else
    {//echo $conn->error;
    echo "<script type='text/javascript'>alert('Error')</script>";
    }
}
?>
      
    </body>

</html>
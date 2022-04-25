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


                                    
                    			<?php $book_id = $_GET['id'];?>
                                <form class="form-horizontal row-fluid" action="edit_book_details.php?id=<?php echo $book_id ?>" method="post" enctype="multipart/form-data">

                                <?php
                                    $sql = "SELECT * FROM book where book_id = '$book_id';";
                                    $user_query=mysqli_query($conn,"$sql");
                                    $row=mysqli_fetch_array($user_query);
                                    $title = $row['book_title'];
                                    $category = $row['category'];
                                    $author = $row['author'];
                                    $copies = $row['book_copies'];
                                    $publisher=$row['publisher_name'];
                                    $year=$row['year'];
                                    $isbn = $row['isbn'];
                                    $status = $row['status'];
                                    
                                ?>
                                <div class="control-group">
                                        <label class="control-label" for="Book_Id"><b>Book_Id:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Book_Id" name="Book_Id" value= "<?php echo $book_id?>" class="span8" required readonly>
                                        </div>
                                    </div>

                                <div class="control-group">
                                        <label class="control-label" for="Title"><b>Title:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Title" name="Title" value= "<?php echo $title?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Category"><b>Category:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Category" name="Category" value= "<?php echo $category?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Author"><b>Author:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Author" name="Author" value= "<?php echo $author ?>" class="span8" required >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="Copies"><b>Copies:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Copies" name="Copies" value= "<?php echo $copies ?>" class="span8" required >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="Publisher"><b>Publisher:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Publisher" name="Publisher" value= "<?php echo $publisher ?>" class="span8" required >
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Year"><b>Year:</b></label>
                                        <div class="controls">
                                        <input type="text" id="Year" name="Year" value= "<?php echo $year ?>" class="span8" required >
                                        </div>
                                    </div>   
                                    <div class="control-group">
                                        <label class="control-label" for="ISBN"><b>ISBN:</b></label>
                                        <div class="controls">
                                        <input type="text" id="ISBN" name="ISBN"  value= "<?php echo "$isbn"?>" class="span8" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                            <label class="control-label" for="Status"><b>Status:</b></label>
                                            <div class="controls">
                                                <select name = "Status" id = "Status" tabindex="1" value="<?php echo $status ?>" data-placeholder="Select Status" class="span6" required>
                                                    <option value="New">New</option>
                                                    <option value="Old">Old</option>
                                                    <option value="Archived">Archived</option>
                                                </select>
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
    $tile = $_POST['Title'];
    $Category=$_POST['Category'];
    $Author=$_POST['Author'];
    $Copies = $_POST['Copies'];
    $Publisher = $_POST['Publisher'];
    $Year = $_POST['Year'];
    $ISBN = $_POST['ISBN'];
    $Status = $_POST['Status'];
    $sql = "select * from transaction where book_id = '$id' and return_status = 'NOT RETURNED' or return_status = 'RETURN NACCEPTED' ";
    $borrow_details = mysqli_query($conn,$sql);
    $row11 = mysqli_fetch_array($borrow_details);
    $count = mysqli_num_rows($borrow_details);
    if ($count == 0)
    // echo "<script type='text/javascript'>alert('$Status')</script>";
        {
            $sql = "UPDATE `book` SET `book_title`='$title',`category`='$Category',`author`='$Author',`book_copies`='$Copies',`publisher_name`='$Publisher',`isbn`='$ISBN',`year`='$Year',`status`='$Status' WHERE book_id='$book_id';";
            if($conn->query($sql) === TRUE){
            echo "<script type='text/javascript'>alert('Success')</script>";
            header( "Refresh:0.01; url=book.php", true, 303);
            }
            else
            {//echo $conn->error;
            echo "<script type='text/javascript'>alert('Error')</script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Cannot Edit as someone has this book')</script>";
        }
}
?>
      
    </body>

</html>
<?php
include('header.php');
?>
                    
        <div class="span12">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h3>Reccomend a Book</h3>
                </div>
                <div class="module-body">

                        
                        <br >

                        <form class="form-horizontal row-fluid" action="recommendations.php" method="post">
                            <div class="control-group">
                                <label class="control-label" for="Title"><b>Book Title</b></label>
                                <div class="controls">
                                    <input type="text" id="title" name="title" placeholder="Title" class="span8" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="Title"><b>Author</b></label>
                                <div class="controls">
                                    <input type="text" id="author" name="author" placeholder="Author's Name" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="Description"><b>Description</b></label>
                                <div class="controls">
                                    <input type="text" id="Description" name="Description" placeholder="Description" class="span8">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="submit" class="btn" style = "background-color: #a29bfe; color:#fff">Submit Recommendation</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>

            
            
        </div><!--/.content-->
        <div>
</br></br></br></br></br></br></br></br></br>
</div>
    </div><!--/.span9-->

        
    </div>
</div>

<!--/.container-->
</div>
<?php include 'footer.php'; ?>
        
        <!--/.wrapper-->
        <!-- <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script> -->

<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $Author = $_POST['Author'];
    $username=$_SESSION['username'];
    $sql1="INSERT INTO recommendations (book_name,author,description,username) values ('$title','$Author','$Description','$username')";
    if($conn->query($sql1) === TRUE){
    echo "<script type='text/javascript'>alert('Success')</script>";
    }
    else
    {//echo $conn->error;
    echo "<script type='text/javascript'>alert('Error')</script>";
    }
    
}
?> 

    </body>

</html>
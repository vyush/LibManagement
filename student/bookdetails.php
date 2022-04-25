<?php include 'header.php'?>

                    
        <div class="span9">
            <div class="content">

            <div class="module">
                <div class="module-head">
                    <h3>Book Details</h3>
                </div>
                <div class="module-body">
            <?php
                $x=$_GET['id'];
                $sql="SELECT * FROM book WHERE book_id='$x'";
                $result=mysqli_query($conn,$sql);
                $row=$result->fetch_assoc();    
                
                    $bookid=$row['book_id'];
                    $name=$row['book_title'];
                    $publisher=$row['publisher_name'];
                    $year=$row['year'];
                    $avail=$row['book_copies'];
                    echo "<b>Book ID:</b> ".$bookid."<br><br>";
                    echo "<b>Title:</b> ".$name."<br><br>";
                    echo "<b>Category:</b> ".$row['category']."<br><br>";
                    echo "<b>Author:</b> ";
                    echo $row['author']."&nbsp;";
                    echo "<br><br>";
                    echo "<b>Publisher:</b> ".$publisher."<br><br>";
                    echo "<b>Year:</b> ".$year."<br><br>";
                    echo "<b>ISBN:</b> ".$row['isbn']."<br><br>";
                    echo "<b>Availability:</b> ".$avail."<br><br>";

                    
            
                
                ?>
                
            <a href="book.php" class="btn btn-primary">Go Back</a>                             
                    </div>
                </div>
                </div>
    </div>
        
        <!--/.span9-->
    </div>
        <!--/.span9-->
    </div>
</div>
            <!--/.container-->
            <?php include 'footer.php'; ?>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>

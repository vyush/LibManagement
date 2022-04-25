<?php
include('header.php');
?>

            <div class="span12">
            <center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
									    <th width="1%">Book Id.</th>                                 
                                        <th width="10%">Book Title</th>                                 
                                        <th width="5%">Category</th>
										<th width="10%">Author</th>
										<!-- <th>Book Pub</th> -->
										<th width="4%">ISBN</th>
										<th width="1%">Year</th>
										<!-- <th>Date Added</th> -->
										<th>Status</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
										<th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
                                    $username=$_SESSION['username'];
                                    $user_query=mysqli_query($conn,"select id from users where username = '$username'");
                                    $row11=mysqli_fetch_array($user_query);
                                    $id = $row11['id'];
                                    $sql = "select * from transaction where user_id = '$id' and return_status = 'RETURNED'";
                                    $user_query=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($user_query)){
                                        $id=$row['book_id'];
                                        $sql = "select * from book where book_id = '$id'";
                                        $borrow_details = mysqli_query($conn,$sql);
                                        $row1 = mysqli_fetch_array($borrow_details);
                                        $title = $row1['book_title'];
                                        $catagory=$row1['category'];
                                        $author = $row1['author'];
                                        $isbn = $row1['isbn'];
                                        $year = $row1['year'];
                                        $status = $row1['status'];
                                        $Issue_D = $row['borrow_date'];
                                        $Return_D = $row['return_date'];

                                        $sql = "select * from transaction where book_id = '$id' and return_status = 'NOT RETURNED'";
                                        $borrow_details = mysqli_query($conn,$sql);
                                        $row11 = mysqli_fetch_array($borrow_details);
                                        $count = mysqli_num_rows($borrow_details);
                                        $total =  $row1['book_copies']  - $count;
                                    // $count 
									/* $total =  $book_copies  - $borrow_details;
									
									echo $total; */
											// $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
											// $cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
									<td><?php echo $catagory; ?> </td>
                                    <td><?php echo $author; ?> </td> 
                                    <td ><?php echo $isbn;   ?> </td>
									 <td><?php echo $year; ?></td>
									 <td><?php echo $status; ?></td>
									 <td><?php echo $Issue_D; ?></td>		
									 <td><?php echo $Return_D; ?></td>
									
                                    <td class="action" style = "vertical-align: middle;">
									
                                    <center><a href="bookdetails.php?id=<?php echo $id; ?>" class="btn" style = "background-color: #a29bfe;" >Details</a>
                                      	<?php
                                      	if($total > 0 && $status != "Archived")
                                      		echo "<a href=\"issue_request.php?id=".$id."\" class=\"btn btn-success\">Re-Issue</a>";
                                        ?>
                                        </center>
										
                                    </td>
                                    </tr>
                                    </tr>
									<?php  }  ?> 
                           
                                </tbody>
                            </table>
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
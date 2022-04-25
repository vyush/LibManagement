<?php include 'header.php';?>
                    <div class="span12" >
                    <div class="alert alert-primary" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-info-sign icon-large"></i>&nbsp;Late return warrents ₹2 per late day.</strong>
                    </div>
                        <ul class="nav nav-pills nav-justified" >
                            <li   class="active" ><a href="book.php">All</a></li>
                            <li><a href="new_books.php">New Books</a></li>
                            <li><a href="old_books.php">Old Books</a></li>
                            <li><a href="archived.php">Archived Books</a></li>
                        </ul>
                        <center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
									    <th width="5%">Book Id.</th>                                 
                                        <th width="10%">Book Title</th>                                 
                                        <th width="5%">Category</th>
										<th width="10%">Author</th>
										<th width="5%">Copies</th>
										<!-- <th>Book Pub</th> -->
										<th width="10%">Publicatoin</th>
										<th width="10%">ISBN</th>
										<th width="5%">Year</th>
										<!-- <th>Date Added</th> -->
										<th width = 10%>Status</th>
										<th width = 20%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

							
							
									

								    $user_query=mysqli_query($conn,"select * from book");
									while($row=mysqli_fetch_array($user_query)){
                                        $id=$row['book_id'];  
                                        $catagory=$row['category'];
                                        $book_copies = $row['book_copies'];
                                        $sql = "select * from transaction where book_id = '$id' and return_status = 'NOT RETURNED'";
                                        $borrow_details = mysqli_query($conn,$sql);
                                        $row11 = mysqli_fetch_array($borrow_details);
                                        $count = mysqli_num_rows($borrow_details);
                                        $status = $row['status'];
                                        $total =  $book_copies  -  $count;
                                    // $count 
									/* $t4otal =  $book_copies  - $borrow_details;
									
									echo $total; */
											// $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
											// $cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['book_id']; ?></td>
                                    <td><?php echo $row['book_title']; ?></td>
									<td><?php echo $catagory; ?> </td>
                                    <td><?php echo $row['author']; ?> </td> 
                                    <td ><?php echo /* $row['book_copies']; */   $total;   ?> </td>
                                     <!-- <td><?php echo $row['book_pub']; ?></td> -->
									 <td><?php echo $row['publisher_name']; ?></td>
									 <td><?php echo $row['isbn']; ?></td>
									 <td><?php echo $row['year']; ?></td>		
									 <!-- <td><?php echo $row['date_added']; ?></td> -->
									 <td><?php echo $status; ?></td>
									
                                    <td class="action" style = "vertical-align: middle;">
									
                                    <center><a href="bookdetails.php?id=<?php echo $id; ?>" class="btn" style = "background-color: #a29bfe;">Details</a>
                                      	<?php
                                      	if($total > 0 && $status != "Archived")
                                      		echo "<a href=\"issue_request.php?id=".$id."\" class=\"btn btn-success\">Issue</a>";
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

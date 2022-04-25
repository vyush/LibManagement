<?php
include('header.php');
?>

            <div class="span12">
            <div class="alert alert-primary" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-info-sign icon-large"></i>&nbsp;You can renew only 7 days before the end date and it renwes to 2 weeks after the end date.Renew Requests are Automatically Accepted.</strong>
                        </div>
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
										<th width="12%">Transaction Status</th>
                                        <th>Issue Date</th>
                                        <th>Due/Returned Date</th>
                                        <!-- <th>Return Date</th> -->
										 <th class= "action">Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
                                    $username=$_SESSION['username'];
                                    $user_query=mysqli_query($conn,"select id from users where username = '$username'");
                                    $row11=mysqli_fetch_array($user_query);
                                    $id = $row11['id'];
                                    $sql = "select * from transaction where user_id = '$id' and (return_status = 'NOT RETURNED' OR return_status = 'NOT ACCEPTED' OR return_status = 'RETURN NACCEPTED')";
                                    $user_query=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($user_query)){
                                        $return_status = $row['return_status'];
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
                                        $tstatus = $row['return_status'];
                                        $Issue_D = $row['borrow_date'];
                                        $Return_D = $row['return_date'];
                                        $renews = $row['Renews'];
                                        $sql = "select * from transaction where book_id = '$id' and (return_status = 'NOT RETURNED' OR return_status = 'RETURN NACCEPTED')";
                                        $borrow_details = mysqli_query($conn,$sql);
                                        $row11 = mysqli_fetch_array($borrow_details);
                                        $count = mysqli_num_rows($borrow_details);
                                        $total =  $row1['book_copies']  - $count;
                                        // echo "<script>alert('$renews')</script>";
                                    // $count 
									/* $total =  $book_copies  - $borrow_details;
									
									echo $total; */
											// $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
											// $cat_row = mysqli_fetch_array($cat_query);
                                            // use \Datetime;

                                            // $now = new DateTime();  
                                            // $now->format('Y-m-d H:i:s');
                                            // echo "<script>alert('$now->getTimestamp()')</script>";
									?>
                                    
    
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
									<td><?php echo $catagory; ?> </td>
                                    <td><?php echo $author; ?> </td> 
                                    <td ><?php echo $isbn;   ?> </td>
									 <td><?php echo $year; ?></td>
									 <td><?php echo $tstatus; ?></td>
									 <td><?php echo $Issue_D; ?></td>		
									 <td><?php if($tstatus == "NOT ACCEPTED") echo "-";
                                                else echo $Return_D ?></td> 
									
                                    <td class="action" style = "vertical-align: middle;">
									
                                    <center><a href="bookdetails.php?id=<?php echo $id; ?>" class="btn btn-primary">Details</a>
                                      	<?php
                                      	if($status != "Archived" && $return_status == "NOT RETURNED")
                                      		echo "<a href=\"return_request.php?id=".$id."\" class=\"btn btn-success\">Return</a>";
                                        ?>
                                        <?php
                                        // $date = "SELECT CURDATE() as date";
                                        // $user_queryi=mysqli_query($conn,$date);
                                        // $rowi=mysqli_fetch_array($user_queryi);
                                        // $today = $rowi['date'];
                                        $date = "SELECT DATEDIFF(DATE_ADD('$Issue_D',INTERVAL ('$renews' + 1) *14 DAY),CURDATE()) as x";
                                        $user_queryi=mysqli_query($conn,$date);
                                        $rowi=mysqli_fetch_array($user_queryi);
                                        $diff = $rowi['x'];
                                        // echo "<script>alert('$diff')</script>";
                                      	if($status != "Archived" && $return_status == "NOT RETURNED" && ($diff <= 7 && $diff>0))
                                      		echo "<a href=\"renew_request.php?id=".$id."\" class=\"btn btn-success\">Renew</a>";
                                            
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
            <div></br></br></br></br></br></br></br></br></br></br></br></br></div>
            </div>
            
            <!--/.container-->
            <?php include 'footer.php'?>
        
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
<?php include 'header.php';?>
                    <div class="span12" >
                        <ul class="nav nav-pills nav-justified" >
                            <li    ><a href="users.php">All</a></li>
                            <li><a href="accepted_user.php">Accepted Users</a></li>
                            <li  class="active"><a href="user_requests.php">User Requests</a></li>
                        </ul>
                        <center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
									    <th width="1%">User Id.</th>                                 
                                        <th width="10%">Name</th>                                 
                                        <th width="5%">Username</th>
										<th width="10%">Email</th>
										<!-- <th>Date Added</th> -->
										<th>Status</th>
										<th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

							
							
									

								    $user_query=mysqli_query($conn,"select * from users WHERE approval_status = 'HOLD'; ");
									while($row=mysqli_fetch_array($user_query)){
                                        $id=$row['Id'];
                                        $name = $row['name'];  
                                        $username = $row['username'];
                                        $email = $row['email'];
                                        $status=$row['approval_status'];
                                        $role = $row['role']
                                    // $count 
									/* $t4otal =  $book_copies  - $borrow_details;
									
									echo $total; */
											// $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
											// $cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
									<td><?php echo $username; ?> </td>
                                    <td><?php echo $email; ?> </td> 
                                    <td ><?php echo $status;   ?> </td>
                                    <td class="action" style = "vertical-align: middle;">
									
                                    <center><a href="userdetails.php?id=<?php echo $id; ?>" class="btn btn-success" style = "background-color:#6c5ce7; color:#fff">Details</a>
                                    <?php
                                      	if($status == "HOLD" && $role = "Student")
                                      		echo "<a href=\"join_request.php?id=".$id."\" class=\"btn btn-success\">Approve</a>";
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

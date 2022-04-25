<?php include 'header.php';?>
                    <div class="span12" >
                        <ul class="nav nav-pills nav-justified" >
                            <li   ><a href="pay_done.php">All payments</a></li>
                            <li  class="active"><a href="payments_completed.php">Accepted Payments</a></li>
                            <li><a href="payments_pending.php">Payments Pending</a></li>
                            <li><a href="payments_rejected.php">Payments Rejected</a></li>
                        </ul>
                        <center class="title">
						<h1>Payments done.</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
									    <th width="5%">Transaction Id.</th>                                 
                                        <th width="20%">username</th>                                 
                                        <th width="15%">Amount</th>
                                        <th width="15%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
                                    $id=$_SESSION['id'];
							
							
									

								    $user_query=mysqli_query($conn,"select * from payment where user_id = '$id' and Status = 'APPROVED'");
									while($row=mysqli_fetch_array($user_query)){
                                        $id=$row['pay_id'];  
                                        $amount = $row['amount'];
                                        $username = $_SESSION['username'];
                                        $status = $row['status'];
                                    // $count 
									/* $t4otal =  $book_copies  - $borrow_details;
									
									echo $total; */
											// $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
											// $cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $amount; ?></td>
									<td><?php echo $status; ?></td>
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

<?php include 'header.php';?>
                    <div class="span12" >
                        <ul class="nav nav-pills nav-justified" >
                            <li><a href="book_req.php">All Requests</a></li>
                            <li><a href="issue_request.php">Issue Requests</a></li>
                            <li class="active"><a href="return_request.php">Return Requests</a></li>
                            <li><a href="completed.php">Completed Requests</a></li>
                        </ul>
                        <center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
                                    <th width="10%">Request Id.</th>                                 
                                        <th width="30%">Book Title</th>                                 
                                        <th width="20%">Username</th>
                                        <th width ="10%">Request Type</th>
										<th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

							
							
									

								    $user_query=mysqli_query($conn,"select * from transaction where return_status = 'RETURN NACCEPTED'");
									while($row=mysqli_fetch_array($user_query)){
                                        $id=$row['trans_id'];  
                                        $book_id=$row['book_id'];
                                        $user_query1=mysqli_query($conn,"SELECT book_title from book WHERE book_id = '$book_id';");
                                        $row1 = mysqli_fetch_array($user_query1);
                                        $book_title = $row1['book_title'];
                                        $user_id = $row['user_id'];
                                        
                                        $user_query11=mysqli_query($conn,"SELECT username from users WHERE Id = '$user_id';");
                                        $row11 = mysqli_fetch_array($user_query11);
                                        $username = $row11['username'];
                                        $status = $row['return_status'];
                                        // $count 
                                        /* $t4otal =  $book_copies  - $borrow_details;
                                        
                                        echo $total; */
                                                // $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
                                                // $cat_row = mysqli_fetch_array($cat_query);
                                        ?>
                                        <tr class="del<?php echo $id ?>">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $book_title ?></td>
                                        <td><?php echo $username; ?> </td>
                                        <td><?php if ($status == "NOT ACCEPTED") echo "ISSUE";
                                                  elseif ($status == "RETURN NACCEPTED") echo "RETURN";
                                                  elseif ($status == "RETURNED") echo "RETURNED";
                                                  elseif ($status == "ACCEPTED") echo "ISSUED";
                                                  else echo "DENIED";
                                                ?>
                                        <td class="action" style = "vertical-align: middle;">
                                        
                                        <center>
                                        <?php if($status ==  "NOT ACCEPTED") echo "
                                        <a href=\"acceptbookreq.php?id=".$id."\"class=\"btn btn-success\" >ACCEPT</a>
    
                                        <a href=\"rejectbookreq.php?id=".$id."\"class=\"btn btn-success\" style = \"background-color:#ff0000; color:#fff\">DECLINE</a>";
                                        elseif($status == "RETURN NACCEPTED")echo "
                                        <a href=\"acceptbookreq.php?id=".$id."\"class=\"btn btn-success\" >ACCEPT</a>";
                                        else {
                                            echo "-";
                                        }
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

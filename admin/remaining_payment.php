<?php include 'header.php';?>
                    <div class="span12" >
                        <center>
						<h1>Payments Remaining List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
									    <th width="5%">User Id.</th>                                 
                                        <th width="20%">Username</th>                                 
                                        <th width="15%">Remaining Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

							
							
									

								    $user_query=mysqli_query($conn,"select * from users where approval_status = 'ACCEPTED' and role = 'Student'");
									while($row=mysqli_fetch_array($user_query)){
                                        $user_id=$row['Id'];  
                                        $username=$row['username'];
                                        $user_query1=mysqli_query($conn,"select SUM(amount) as sum_a from payment where user_id = '$user_id' and status = 'APPROVED'");
                                        // $user_query2=mysqli_query($conn,"select * from transactions where approval_status = 'ACCEPTED' and role = 'Student'");
                                        $row1=mysqli_fetch_array($user_query1);
                                        $paid_till_now = $row1['sum_a'];
                                        $user_query2=mysqli_query($conn,"select * from transaction where user_id = '$user_id'");
                                        $fine = 0;
                                        while($row2=mysqli_fetch_array($user_query2))
                                        {
                                            if($row2['return_status'] == 'NOT ACCEPTED' || $row2['return_status'] == 'DENIED')
                                            {
                                                ;
                                            }
                                            elseif($row2['return_status'] == 'ACCEPTED' || $row2['return_status'] == 'RETURN NACCEPTED')
                                            {
                                                $fine = 10 + $fine;
                                                $renew = $row2['Renews'];
                                                $fine = $fine + $renew * 5;
                                                $days = ($renew + 1) * 14;
                                                $datefirst = date('Y-m-d');
                                                // $datefirst = date('Y-m-d', strtotime($datefirst. ' + '. $days.' days'));
                                                
                                                $datesecond = $row2['borrow_date'];
                                                $datesecond = date('Y-m-d', strtotime($datesecond. ' + '. $days.' days'));
                                                $daysLeft = abs(strtotime($datefirst) - strtotime($datesecond));
                                                $diff = $daysLeft/(60 * 60 * 24);
                                                // $diff=date_diff(date_create($datefirst),date_create($datesecond));
                                                // echo $diff;
                                                $fine = $fine + $diff;
                                            }
                                            elseif($row2['return_status'] == 'RETURNED')
                                            {
                                                $fine = 10 + $fine;
                                                $renew = $row2['Renews'];
                                                $fine = $fine + $renew * 5;
                                                $days = ($renew + 1) * 14;
                                                $datefirst = $row2['return_date'];
                                                // echo $datefirst;
                                                $datesecond = $row2['borrow_date'];
                                                $datesecond = date('Y-m-d', strtotime($datesecond. ' + '. $days.' days'));
                                                // echo $datesecond;
                                                $daysLeft = abs(strtotime($datefirst) - strtotime($datesecond));
                                                $diff = $daysLeft/(60 * 60 * 24);
                                                // echo $diff;
                                                $fine = $fine + $diff;
                                            }
                                        }

                                        $total = $fine-$paid_till_now;
                                    // $count 
									/* $t4otal =  $book_copies  - $borrow_details;
									
									echo $total; */
											// $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
											// $cat_row = mysqli_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $user_id ?>">
                                    <td><?php echo $user_id; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $total; ?></td>
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

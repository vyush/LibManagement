<?php include 'header.php';?>
                    <div class="span9" >
                        <?php
                            $user_id=$_SESSION['id'];  
                            $username=$_SESSION['username'];
                            $email = $_SESSION['email'];
                            $user_query1=mysqli_query($conn,"select SUM(amount) as sum_a from payment where user_id = '$user_id' and status = 'APPROVED'");
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
                        ?>
                        <center class="title">
						<h1>Payment.</h1>
                        
						</center>
                        <center>
                            <div class="boxed" style = "background-color: #6c5ce7; color:white; font-size:2em;height: 40px; text-align: center;padding: 10px;">   

                            <center>Outstanding Amount</center> 
                            </div>
                            <?php
                            if($total > 0)
                            echo "<div class=\"boxed\" style = \"background-color:#FF7F7F; color:white; border: 2px solid black;height: 70px;padding: 20px;font-size:1.2em;\">";
                            else
                            echo "<div class=\"boxed\" style = \"background-color:#90EE90; color:white; border: 2px solid black;height: 70px;padding: 20px;font-size:1.2em;\">";
                            echo "₹".$total;
                            echo "</div>";
                            ?>
                        </center> 
                        </br>
                        <div class="module">
                            <div class="module-head" style = "background-color:#6c5ce7;">
                                <h3 style="color: #f0f0f0;">Make Payment</h3>
                            </div>
                            <div class="module-body">


                                    
                    			
                                <form class="form-horizontal row-fluid" action="makepayment.php?id=<?php echo $username ?>" method="post" enctype="multipart/form-data">

                                <div class="control-group">
                                        <label class="control-label" for="Name"><b>Name:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8" required readonly>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                                        <div class="controls">
                                            <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8" required readonly>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Amount"><b>Amount:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Amount" name="Amount" value= "" class="span8" required>
                                        </div>
                                    </div>
                                    </br>
                                    
                                    <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn-primary" style = "width:30%"><center>Pay</center></button>
                                                </div>
                                            
                                    </div>
                                                                                                         

                                </form>
                    		           
                        </div>
                        </div> 	
                    </div>
                    <!--/.span9-->
                </div>
            
            <!--/.container-->
            <?php include 'footer.php'?>
            <?php
if(isset($_POST['submit']))
{
    $name = $_POST['Name'];
    $email=$_POST['EmailId'];
    $amount=$_POST['Amount'];

    $sql1="INSERT INTO `payment`(`user_id`, `amount`, `status`) VALUES ('$user_id','$amount','NOT APPROVED')";
    if($conn->query($sql1) === TRUE){
    echo "<script type='text/javascript'>alert('Success')</script>";
    header( "Refresh:0.01; url=index.php", true, 303);
    }
    else
    {//echo $conn->error;
    echo "<script type='text/javascript'>alert('Error')</script>";
    }
}
?>
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

<?php
include 'header.php';

?>
                    <div class="span12" >
                    	<center>
                        
                           	<div class="card" style="width: 40%;" > 
                    			<img class="card-img-top" src="<?php echo $path;?>" alt="Card image cap" width = 256 height = 256 >
                    			<div class="card-body" >

                                   
                    				
                    				<h1 class="card-title"><center><?php echo $name ?></center></h1>
                    				<br>
                                    <p><b>Username: </b><?php echo $username ?></p>
                                    <br>
                    				<p><b>Email ID: </b><?php echo $email ?></p>
                    				<br>
                    				<p><b>Role: </B><?php echo $role ?></p>
                    				<br>
                    				<p><b>Status: </b><?php echo $status ?></p>
                    				</b>
                                

                    			</div>
                    		</div>
                            <br>
                            <a href="edit_student_details.php" class="btn " style = "background-color: #a29bfe;">Edit Details</a>    
      					</center>              	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <div></br></br></br></div>
            <!--/.container-->
        </div>
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
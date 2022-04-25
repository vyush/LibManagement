<?php include 'header.php';?>
                    <div class="span12" >
                        <center class="title">
						<h1>Recomendations</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  width="100%" style="border-collapse: collapse">
                                <p></p>
                                <thead>
                                    <tr>
                                        <th width="10%">Reccomendation Id.</th>                                 
                                        <th width="20%">Book Name</th>                                 
                                        <th width="10%">Username</th>
                                        <th width ="10%">Author</th>
                                        <th width ="30%">Description</th>
                                        <th >Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
                                    $user_query=mysqli_query($conn,"select * from recommendations");
                                    
                                    while($row=mysqli_fetch_array($user_query)){
                                        $id=$row['recommend_id'];  
                                        $book=$row['book_name'];
                                        $author = $row['author'];
                                        $description = $row['description'];
                                        $user_id = $row['user_id'];
                                        $user_query1=mysqli_query($conn,"select username from users where Id = '$user_id'");
                                        
                                        $row2=mysqli_fetch_array($user_query1);
                                        $username = $row2['username'];
                                        $status = $row['Completed'];
                                        // $count 
                                        /* $t4otal =  $book_copies  - $borrow_details;
                                        
                                        echo $total; */
                                                // $cat_query = mysqli_query($conn,"select * from category where category_id = '$cat_id'");
                                                // $cat_row = mysqli_fetch_array($cat_query);
                                        ?>
                                        <tr class="del<?php echo $id ?>">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $book ?></td>
                                        <td><?php echo $username; ?> </td>
                                        <td><?php if($author != "")echo $author;
                                        else echo "-";?></td>
                                        <td><?php if($description != "")echo $description;
                                        else echo "-";?> </td>
                                    <td class="action" style = "vertical-align: middle;">
                                        
                                        <center>
                                         <?php if($status == "NOT COMPLETED")
                                        echo "<a href=\"seen.php?id=".$id."\" class=\"btn btn-success\">Seen</a>";
                                        else
                                        echo "Seen";
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

<?php include ('session.php');?>
<?php include ('head.php');?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Party</h3>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal3">Add Party</button>
                    <?php include ('add_candidate_modal3.php');?>
                    <hr>

                    
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                             
                                
                                <th>Party ID</th>
                                <th>Picture</th>
                                <th>President</th>
                                <th>Vice President</th>
                                <th>Vote Count</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                            <?php 
                                require 'dbcon.php';
                                $bool = false;
                                $query = $conn->query("SELECT * FROM party");

                                while($row = $query->fetch_array()){ 
                                    
                        		?>
                            	<td><?php echo $row ['party_id'];?></td>
                                <td width="50"><img src="<?php echo $row['img']; ?>" width="50" height="50" class="img-rounded"></td>
                                
                                <td><?php echo $row ['president'];?></td>
                                <td><?php echo $row ['vice_president'];?></td>
                                
                                <td><?php echo $row ['vote_count'];?></td>
      
                                    <?php 
                                        
                                        require 'edit_candidate_modal.php';
                                    ?>
                            </tr>
                            
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
                            <!-- /.table-responsive -->
                        
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Candidate  -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <?php include ('script.php');?>

</body>

</html>


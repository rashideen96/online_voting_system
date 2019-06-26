<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">         
												<div class="panel panel-primary">
													<div class="panel-heading">
														<center>Add Voter</center>
													</div>    
												</div>
											</h4>
										</div>
										
										
                                        <div class="modal-body">
										<form method = "post" enctype = "multipart/form-data">	
											<div class="form-group">
												<label>Student ID</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true">
													
											</div>

										
											<div class="form-group">
												<label>Password</label>
													<input class="form-control" type ="text" name = "password" placeholder="Password" required="true">
											</div>
											<div class="form-group">
												<label>Retype-Password</label>
													<input class="form-control" type ="text" name = "password1" placeholder="Password" required="true">
											</div>
											<div class="form-group">
												<label>Fullname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											
											<div class="form-group">
												<label>Year_Level</label>
													<select class = "form-control" name = "year_level">
														<option></option>
														<option>1st Year</option>
														<option>2nd Year</option>
														<option>3rd Year</option>
														<option>4th Year</option>
														
														
														
													
													</select>
											</div>
											
											
											<div class="form-group">
												<label>Gender</label>
													<select class = "form-control" name = "gender">
														<option></option>
														<option>Male</option>
														<option>Female</option>
																										
													
													</select>
											</div>
											<div class="form-group">
												<label>Faculty</label>
													<select class = "form-control" name = "prog_study">
														<option></option>
														<option>FCVAC</option>
														<option>FESS</option>
														<option>FELS</option>
																										
													
													</select>
											</div>
											
										
												 <button name = "save" type="submit" class="btn btn-primary">Save Data</button>
												 <button name = "save" type="reset" class="btn btn-success">Cancel All</button>




										  
										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           
                                        </div>
										
										</form>
										
										
										<?php include ('dbcon.php');
if (isset ($_POST ['save'])){

			$firstname=$_POST['firstname'];
			$gender=$_POST['gender'];
			$id_number=$_POST['id_number'];
			$prog_study=$_POST['prog_study'];
			$year_level=$_POST['year_level'];
			$password = $_POST['password'];
			$password1 = $_POST['password1'];
			$date = date("Y-m-d H:i:s");

			$query = $conn->query("SELECT * FROM ids WHERE id_number='$id_number'") or die (mysql_error());
			$count = $query->fetch_array();
	if ($count  < 1){
?>
	<script>
			alert( 'Invalid Student ID');
			//window.location='register_voters.php';
	</script>		
<?php
	}
	else{
		
		$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
		$count1 = $query->fetch_array();
		if ($count1 == 0) {
			if ($password == $password1) {
				$conn->query("insert into voters(id_number, password, firstname, gender,prog_study,year_level,status, date) VALUES('$id_number', '".md5($password)."','$firstname', '$gender','$prog_study', '$year_level','Unvoted', '$date')");
			?>
	            <script>
			        alert( 'Successfully Registered');
			         //window.location='../voters.php';
	            </script>
            <?php
			}else{
				?>
	            <script>
			        alert( 'Your Passwords Did Not Match');
			         //window.location='index.php';
	            </script>
            <?php
			}
		}else{
			?>
	            <script>
			        alert( 'ID Already Registered');
			        // window.location='../voters.php';
	            </script>
            <?php
		}
		

	}
										
										
										
										}
										
										?>					
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
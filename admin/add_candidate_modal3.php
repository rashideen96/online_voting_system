<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>Add Party</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					
					<div class="form-group">
						<label>Vote ID</label>
							<input class="form-control" type ="text" name = "party" placeholder="Please enter vote ID" required="true">
					</div>

					<div class="form-group">
						<label>President</label>
							<input class="form-control" type ="text" name = "president" placeholder="Please enter president name" required="true">
					</div>
										
					<div class="form-group">
						<label>Vice President</label>
						<input class="form-control" type ="text" name = "vice_president" placeholder="Please enter vice president name" required="true">
					</div>
								
					<div class="form-group">
                        <label>Image</label>
						<input type="file" name="image"required> 
                    </div>
						<button name = "save" type="submit" class="btn btn-primary">Save Data</button>
				</form>  
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
										
										
										
										
			<?php 
				require_once 'dbcon.php';
				
				if (isset ($_POST ['save'])){
				
					$party=$_POST['party'];
					$president = $_POST['president'];
					$vice_president = $_POST['vice_president'];

					$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name= addslashes($_FILES['image']['name']);
					$image_size= getimagesize($_FILES['image']['tmp_name']);
		
					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$location="upload/" . $_FILES["image"]["name"];
					
					$vote_count = 0;
					$conn->query("INSERT INTO party(party_id,img,president,vice_president,vote_count) values('$party','$location','$president', '$vice_president', $vote_count)")or die(mysql_error());
				}						
			?>					
        </div>
                                   
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>
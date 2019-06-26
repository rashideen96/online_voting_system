<?php include ('head.php');?>
<?php include("sess.php");?>
<body>
	<?php include 'side_bar.php'; ?>
    <div id="wrapper">
    </div>
	<form id="vote_form" method = "POST" action = "vote_result.php">
	<div class="col-lg-6">

		<h4 class="text-center">Party</h4>
		<table class="table table-bordered">

			<?php 

			$sql = "SELECT * FROM party";
			$result = $conn->query($sql);

			while ($row = $result->fetch_array()) {
				
				$id = $row['id'];
				$p_id = $row['party_id'];
				$img = $row['img'];
				$president = $row['president'];
				$vice_president = $row['vice_president'];

				?>
				<tr>
					<td width="10%"><b><?php echo $p_id ?></b></td>
					<td>
						<p><img src="admin/<?php echo $img ?>" width="100" height="100" class="img"></p>
					</td>
					<td>
						<p>President: <?php echo $president ?></p>
						<p>Vice President: <?php echo $vice_president ?></p>
					</td>
					<td>Vote  <input type="checkbox" value="<?php echo $id ?>" name="party" class="pres"></td>
				</tr>
				<?php
			}


			 ?>
		
			
			
			
		</table>

		<h4 class="text-center">Candidate</h4>
		<table class="table table-bordered">

			<?php 

			$sql = "SELECT * FROM candidate";
			$result = $conn->query($sql);

			while ($row = $result->fetch_array()) {
				
				$candidate_id = $row['candidate_id'];
				$p_id = $row['position'];
				$img = $row['img'];
				$firstname = $row['firstname'];
				$party = $row['party'];

				?>
				<tr>
					<td width="10%"><b><?php echo $party ?></b></td>
					<td>
						<p><img src="<?php echo $img ?>" width="100" height="100" class="img"></p>
					</td>
					<td>
						<p><?php echo $firstname ?></p>
					</td>
					<td>Vote  <input type="checkbox" name="faculty[]" value="<?php echo $candidate_id ?>" class="fpres"></td>
				</tr>
				<?php
			}


			 ?>
		</table>
	
            
     </div>
				
				
				
	
	
	
	
			
			
			</div>      
        </div>
     </div>

			</div>      
        </div>
     </div>
     <hr/>
		
		<center><button id="vote_button" class = "btn btn-success ballot" type = "submit" name = "submit" disabled>Submit Vote</button></center>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form>
</body>
<?php include ('script.php');
?>
  
  <script type = "text/javascript">
		$(document).ready(function(){

			// $("#vote_button").on('click', function(e){
			// 	e.preventDefault();
			// 	if($(".pres:checked").length == 0) {
			// 		//window.alert('Please vote president');
			// 		$('#vote_button').disabled = true;
			// 	}
			// });
			$(".pres").on("change", function(){

				if ($(".pres:checked").length == 0) {
					$("#vote_button").attr("disabled", "disabled");
				}

				
				if($(".pres:checked").length == 1)
					{
						$("#vote_button").removeAttr("disabled");
						$(".pres").attr("disabled", "disabled");
						$(".pres:checked").removeAttr("disabled");
					}
				else
					{
						$(".pres").removeAttr("disabled");
					}
			});

			$(".fpres").on("change", function(){
				if($(".fpres:checked").length == 5)
					{
						$(".fpres").attr("disabled", "disabled");
						$(".fpres:checked").removeAttr("disabled");
					}
				else
					{
						$(".fpres").removeAttr("disabled");
					}
			});
			
			$(".vpres").on("change", function(){
				if($(".vpres:checked").length == 1)
					{
						$(".vpres").attr("disabled", "disabled");
						$(".vpres:checked").removeAttr("disabled");
					}
				else
					{
						$(".vpres").removeAttr("disabled");
					}
			});
			
		});	
	</script>
</html>


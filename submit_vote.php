<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();

	foreach ($_SESSION['f_id'] as $key => $value ) {
							
		// $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$value'")->fetch_array();

		$conn->query("INSERT INTO `votes` VALUES('', '$value', '$_SESSION[voters_id]')");

		
	}
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[pres_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vp_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[ua_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[ss_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[ea_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[treasurer_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[sg_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vtr_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[tas_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[ps_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[as_id]', '$_SESSION[voters_id]')") or die(mysql_error());

		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[f_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		
		$conn->query("UPDATE party SET vote_count = vote_count+1 WHERE id='$_SESSION[p_id]'");
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
		header("location:index.php");
		
?> 
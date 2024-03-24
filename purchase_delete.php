<?php require_once("connection.php"); ?>
<?php require_once("restrict.php"); ?>
<?php

	$result = mysqli_query($con,"DELETE FROM purchase WHERE purchase_id = " . $_GET["purchase_id"]);
	if($result) {
		header("location:purchase_list.php?delete=done");
	}
	else {
		header("location:purchase_list.php?error=notdelete");
	}

?>
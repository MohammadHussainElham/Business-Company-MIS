<?php
	if(!isset($_SESSION["user_id"])) {
		header("location:login.php?notlogin=true");
	}
?>
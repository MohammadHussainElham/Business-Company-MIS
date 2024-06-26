<?php require_once("connection.php"); ?>
<?php require_once("restrict.php"); ?>
<?php
	$employee = mysqli_query($con,"SELECT * FROM employee ORDER BY firstname ASC");
	$row_employee = mysqli_fetch_assoc($employee);
	
	if(isset($_POST["purchase_date"])) {
		$date = $_POST["purchase_date"];
		$employee_id = $_POST["employee_id"];
		
		$result = mysqli_query($con,"INSERT INTO purchase VALUES (NULL, '$date', $employee_id)"); 
		
		if($result) {
			$last_id = mysqli_insert_id($con);
			header("location:purchase_detail_add.php?purchase_id=$last_id");
		}
		else {
			header("location:purchase_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>ثبت خریداری جدید</h1>
	</div>
	
	<div class="panel-body">
		
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					تاریخ خریداری:
				</span>
			<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" class="form-control" type="text" name="purchase_date">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					کارمند:
				</span>
			<select class="form-control" name="employee_id">
				<?php do { ?>
					<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] ?> <?php echo $row_employee["lastname"] ?></option>
				<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			</select>
			</div>
			
			<input type="submit" value="ثبت نمودن" class="btn btn-primary">
			
		</form>
		
	</div>
	

</div>



<?php require_once("footer.php"); ?>
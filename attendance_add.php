<?php require_once("connection.php"); ?>
<?php require_once("restrict.php"); ?>
<?php
	$employee = mysqli_query($con, "SELECT * FROM employee ORDER BY firstname ASC");
	$row_employee = mysqli_fetch_assoc($employee);

	if(isset($_POST["absent_date"])) {
		$employee_id = $_POST["employee_id"];
		$date = $_POST["absent_date"];
		$parts = explode("-", $date);
		$year = $parts[0];
		$month = $parts[1];
		$day = $parts[2];
		$hour = $_POST["absent_hour"];
		
		$result = mysqli_query($con,"INSERT INTO attendance VALUES ($employee_id, $year, $month, $day, $hour)");
		
		if($result) {
			header("location:attendance_list.php?add=done");
		}
		else {
			header("location:attendance_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

<div class="panel-heading">
	<h1>ثبت غیرحاضری کارمند</h1>
</div>

<div class="panel-body">

	<form method="post">
		<div class="input-group">
			<span class="input-group-addon">
				کارمند:
			</span>
			<select name="employee_id" class="form-control">
				<?php do { ?>
					<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
				<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			</select>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon">
				تاریخ:
			</span>
			<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="absent_date" class="form-control">
		</div>
		
		<div class="input-group">
			<span class="input-group-addon">
				غیر حاضری:
			</span>
			<input type="text" name="absent_hour" class="form-control">
			<span class="input-group-addon">
				ساعت
			</span>
		</div>
		
		<input type="submit" value="ثبت نمودن" class="btn btn-primary">
		
	</form>
	
</div>

</div>



<?php require_once("footer.php"); ?>
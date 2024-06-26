<?php require_once("connection.php"); ?>
<?php require_once("restrict.php"); ?>
<?php

	$employee = mysqli_query($con,"SELECT * FROM employee ORDER BY firstname ASC");
	$row_employee = mysqli_fetch_assoc($employee);

	$employee_id = $_GET["employee_id"];
	$year = $_GET["date_year"];
	$month = $_GET["date_month"];
	$day = $_GET["date_day"];
	
	$attendance = mysqli_query($con,"SELECT * FROM attendance WHERE employee_id=$employee_id AND date_year=$year AND date_month=$month AND date_day=$day");
	$row_attendance = mysqli_fetch_assoc($attendance);

	if(isset($_POST["absent_date"])) {
		$employee_id = $_POST["employee_id"];
		$date = $_POST["absent_date"];
		$parts = explode("-", $date);
		$year = $parts[0];
		$month = $parts[1];
		$day = $parts[2];
		$hour = $_POST["absent_hour"];
		
		$result = mysqli_query($con,"UPDATE attendance SET date_year=$year, date_month=$month, date_day=$day, absent_hour=$hour WHERE employee_id = " . $_GET["employee_id"] . " AND date_year=" . $_GET["date_year"] . " AND date_month=" . $_GET["date_month"] . " AND date_day=" . $_GET["date_day"]);
		
		if($result) {
			header("location:attendance_detail.php?edit=done&employee_id=" . $_GET["employee_id"] . "&date_year=" . $_GET["date_year"] . "&date_month=" . $_GET["date_month"]);
		}
		else {
			header("location:attendance_edit.php?error=notedit&employee_id=" . $_GET["employee_id"] . "&date_year=" . $_GET["date_year"] . "&date_month=" . $_GET["date_month"] . "&date_day=" . $_GET["date_day"]);
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

<div class="panel-heading">
	<h1>ویرایش غیرحاضری کارمند</h1>
</div>

<div class="panel-body">

	<form method="post">
		<div class="input-group">
			<span class="input-group-addon">
				کارمند:
			</span>
			<select name="employee_id" class="form-control" disabled>
				<?php do { ?>
					<option <?php if($_GET["employee_id"] == $row_employee["employee_id"]) echo "selected"; ?> value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
				<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			</select>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon">
				تاریخ:
			</span>
			<input id="absent_date" value="<?php echo $row_attendance["date_year"]; ?>-<?php echo $row_attendance["date_month"]; ?>-<?php echo $row_attendance["date_day"]; ?>" type="text" name="absent_date" class="form-control">
			
		</div>
		
		<div class="input-group">
			<span class="input-group-addon">
				غیر حاضری:
			</span>
			<input value="<?php echo $row_attendance["absent_hour"]; ?>" type="text" name="absent_hour" class="form-control">
			<span class="input-group-addon">
				ساعت
			</span>
		</div>
		
		<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
		
	</form>
	
</div>

</div>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "absent_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>



<?php require_once("footer.php"); ?>
<?php require_once("connection.php"); ?>
<?php require_once("restrict.php"); ?>
<?php require_once("top.php"); ?>
<?php require_once("tools.php"); ?>
<?php

	$year = $_GET["date_year"];
	$month = $_GET["date_month"];

	$overtime = mysqli_query($con,"SELECT * FROM overtime WHERE date_year=$year AND date_month=$month AND employee_id = " . $_GET["employee_id"]);
	$row_overtime = mysqli_fetch_assoc($overtime);

?>


<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>جزییات اضافه کاری کارمند
			در ماه 
			
			<?php echo monthName($_GET["date_month"]); ?>
			<?php echo $_GET["date_year"]; ?>
		</h1>
	</div>
	
	<div class="panel-body">
		
		<table class="table table-striped table-hover">
			<tr>
				<th>شماره</th>
				<th>تاریخ</th>
				<th>اضافه کاری</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>
			
			<?php $x=1; do { if(isset($row_overtime["date_year"])){?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_overtime["date_year"]; ?>/<?php echo $row_overtime["date_month"]; ?>/<?php echo $row_overtime["date_day"]; ?></td>
				<td><?php echo $row_overtime["overtime_hour"]; ?> ساعت</td>
				<td>
					<a href="overtime_edit.php?employee_id=<?php echo $row_overtime["employee_id"]; ?>&date_year=<?php echo $row_overtime["date_year"]; ?>&date_month=<?php echo $row_overtime["date_month"]; ?>&date_day=<?php echo $row_overtime["date_day"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="overtime_delete.php?employee_id=<?php echo $row_overtime["employee_id"]; ?>&date_year=<?php echo $row_overtime["date_year"]; ?>&date_month=<?php echo $row_overtime["date_month"]; ?>&date_day=<?php echo $row_overtime["date_day"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } }while($row_overtime = mysqli_fetch_assoc($overtime)); ?>
			<tr><td colspan="5">
				<a href="overtime_list.php" class="btn btn-primary form-control">لیست اضافه کاری کارمندان</a>
			</td></tr>
		</table>
		
		
	</div>

</div>



<?php require_once("footer.php"); ?>
<?php require_once("connection.php"); ?>
<?php require_once("restrict.php"); ?>
<?php

	if(isset($_POST["firstname"])) { 
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$gender = $_POST["gender"];
		$dob = $_POST["dob"];
		$province = $_POST["province"];
		$district = $_POST["district"];
		$location = $_POST["location"];
		$position = $_POST["position"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		if($email == "") {
			$email = "NULL";
		}
		else {
			$email = "'" . $email . "'";
		}
		$salary = $_POST["salary"];
		$currency = $_POST["currency"];
		
		if($_FILES["photo"]["type"] == "image/jpeg" || $_FILES["photo"]["type"] == "image/png" || $_FILES["photo"]["type"] == "image/gif") {
			
			$path = "images/employee/" . time() . $_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], $path);

			$result = mysqli_query($con,"INSERT INTO employee VALUES (NULL, '$firstname', '$lastname', $salary, '$currency', $email, $dob, '$phone', $gender, '$path', '$province', '$district', '$location', '$position')");
			
			if(!$result) {
				header("location:employee_add.php?error=occured");
			}
			else {
				header("location:employee_list.php?add=done");
			}
		
		} 
		else {
			header("location:employee_add.php?filetype=invalid");
		}
		
	}

?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>ثبت کارمند جدید</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				متاسفانه کارمند جدید ثبت نشد! لطفا دوباره کوشش کنید!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["filetype"])) { ?>
			<div class="alert alert-danger">
				لطفا فایل درست را انتخاب نمایید! (*.jpg, *.gif, *.png)
			</div>
		<?php } ?>
	
		<form method="post" enctype="multipart/form-data">
		
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<div class="input-group">
				<span class="input-group-addon">
				   	<span class="text-danger"> * &nbsp;</span> نام: 
				</span>
				<input type="text" name="firstname" class="form-control" required>
			</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>تخلص:
				</span>
				<input type="text" name="lastname" class="form-control" required>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>جنسیت:
				</span> &nbsp; 
				<label><input checked type="radio" name="gender" value="0"> مذکر</label> &nbsp; 
				<label><input type="radio" name="gender" value="1"> مونث</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>سال تولد:
				</span>
				<?php
					
					$year = jdate("Y", "", "", "", "en");
					$max = $year - 18;
					$min = $year - 65;
					
				?>
				<select name="dob" class="form-control">
				<?php for($x=$max; $x>=$min; $x--) { ?>
					<option><?php echo $x; ?></option>
				<?php } ?>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>ولایت: 
				</span>
				<input type="text" name="province" class="form-control" required>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>ولسوالی:
				</span>
				<input type="text" name="district" class="form-control" required>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					آدرس:
				</span>
				<input type="text" name="location" class="form-control">
			</div>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>تلیفون:
				</span>
				<input type="text" name="phone" class="form-control" required>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					ایمیل:
				</span>
				<input type="text" name="email" class="form-control" >
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>وظیفه:
				</span>
				<input type="text" name="position" class="form-control" required>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>معاش:
				</span>
				<input type="text" name="salary" class="form-control" required>
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>واحد پولی:
				</span>
				<select name="currency" class="form-control">
					<option value="AFS">افغانی</option>
					<option value="USD">دالر</option>
				</select>
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					<span class="text-danger"> * &nbsp;</span>عکس:
				</span>
				<input type="file" name="photo" class="form-control" required>
			</div>
			
			<input type="submit" value="ثبت نمودن" class="btn btn-primary">
				
			</div>
		
		</form>  
	</div>

</div>

<?php require_once("footer.php"); ?>
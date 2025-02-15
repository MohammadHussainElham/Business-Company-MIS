	</div>
	
	
<?php if($_SERVER["PHP_SELF"] != "/business_company/login.php") { ?>		
	<div id="sidebar" style="float:right;" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 rounded">
		
		<?php if(isset($_SESSION["user_id"])) { ?>
			
			<a href="#" class="btn btn-primary">
				<span class="glyphicon glyphicon-shopping-cart"></span>
				فروش جدید
			</a>
			
			<a href="#" class="btn btn-primary">
				<span class="glyphicon glyphicon-tag"></span>
				لیست محصولات
			</a>
			
			<a href="#" class="btn btn-primary">
				<span class="glyphicon glyphicon-book"></span>
				گزارش عایدات
			</a>

			<a href="#" class="btn btn-primary">
				<span class="glyphicon glyphicon-book"></span>
				گزارش مصارفات
			</a>

			<a href="#" class="btn btn-primary">
				<span class="glyphicon glyphicon-globe"></span>
				فرمایشات آنلاین
			</a>
			
			<a href="employee_list.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-user"></span>
				لیست کارمندان
			</a>
			
			<a href="#" class="btn btn-primary">
				<span class="glyphicon glyphicon-lock"></span>
				تغییر رمز ورود
			</a>
			
			<?php } else{ ?>
				<h3 style="text-align:center;" class="text-primary">
					فرمایشات آنلاین با سیستم امنیتی کاملا امن!</h3>
					<img src = "images/323.jpg" width="100%">
				<h3 style="text-align:center;" class="text-primary">End-to-End Encrypted</h3>
			<?php }?>
	</div>
<?php } ?>	
	
	<div class="clearfix"></div>
	
	<div id="footer" style="text-align:center; direction:ltr">
		Copyright &copy; Nature First <?php echo date("Y-m-d");?> all rights reserved! 
		<img src="images/logo3.png" width="100px">
	</div>

</div>
	
</body>
</html>
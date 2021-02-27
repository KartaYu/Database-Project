<?php
session_start();
include("check.php");
if(@$_SESSION['permission']>=1)
{
    header("Location:index.php");
}
?>



<!DOCTYPE HTML>

<html>
	<head>
    	<title>NCUE Courses</title>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script>
	$s=0;
    $(document).ready(function($) {
        $("#form1").validate({
            submitHandler: function(form){
            	$s=1;
                form.submit();
            },
            rules: {
            	memberId: {
                    required: true
                },
                password: {
                    required: true
                }
            }
        });
    });
</script>
<style>
	.error {
	    color: red;
	    font-family: 微軟正黑體;
	    font-weight: normal;
	}
</style>
	</head>

	<body class="subpage">
		<!-- Header -->
		<?php include("header.php"); ?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
						<div class="row 200%">
							<div class="6u$ 12u$(medium)">
								<!-- Form -->
									<h2><strong>登入會員</strong></h2>

									<form id="form1" name="form1" method="POST" action="">
										<div class="row uniform">
											<div class="6u$ 12u$(xsmall)">
												<label for="memberId">請輸入會員帳號</label>
												<input type="text" name="memberId" id="demo-memberId" value="" placeholder="memberId" required/>
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="password">請輸入密碼</label>
												<input type="password" name="password" id="demo-password" value="" placeholder="Password" required/>
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="登入" /></li>
													<a href="regist.php">註冊</a>
													<a href="forget.php">忘記密碼？</a>
											</div>
										</div>
									</form>			
						</div>
					</div>

				</div>

			</section>

			<?php include("footer.php"); ?>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
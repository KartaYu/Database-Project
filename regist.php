<?php 
@$memberId=trim($_POST['demo-memberId']);
$link = mysqli_connect("localhost","root","root123456","group02")
or die ("無法開啟資料庫<br/>");
$sql = "SELECT * FROM  member where memberId='$memberId' ";
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if (isset($_POST['demo-memberId'])) 
{
	if ( $result = mysqli_query($link, $sql) )
	 { 
	    if( $row = mysqli_fetch_assoc($result) ) echo "<script>alert('帳號已存在');</script>"; //帳號已存在
	    else {
	    		$sql = "insert into member(`name`,`nickName`,`email`, `memberId`, `password`,`department`,`permission`) values ('" . $_POST['demo-name'] . "','" . $_POST['demo-nickname'] . "','" . $_POST['demo-email'] . "',' " . $_POST['demo-memberId'] . "','" . $_POST['demo-password'] . "','" . $_POST['demo-category'] . "','1')";
	    		 if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
				    {
				    	 echo "<script>alert('註冊成功');</script>";
				    }
	    } ; //帳號不存在
	}
 } 	
mysqli_close($link); 
 ?>





 
<!DOCTYPE HTML>

<html>
	<head>
    	<title>NCUE Courses</title>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body class="subpage">
		<!-- Header -->
			<?php include("header.php"); ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">					
						<div class="row 100%">
							<div class="6u$ 12u$(medium)">
								<!-- Form -->
									<h2><strong>註冊會員</strong></h2>
									<p>馬上填寫資料註冊會員，就可以發表評價囉！</p>

									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u$ 12u$(xsmall)">
												<label for="name">請輸入姓名</label>
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="nickname">請輸入暱稱</label>
												<input type="text" name="demo-nickname" id="demo-nickname" value="" placeholder="Nick Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="email">請輸入電子郵件</label>
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="memberId">請輸入學號</label>
												<input type="text" name="demo-memberId" id="demo-memberId" value="" placeholder="MemberId"/>
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="password">請設定密碼</label>
												<input type="password" name="demo-password" id="demo-password" value="" placeholder="Password" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">- Department -</option>
														<option value="1">資管系</option>
														<option value="2">會計系</option>
														<option value="3">企管系</option>
														<option value="4">財金系</option>
														<option value="5">其他系所</option>
													</select>
												</div>
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="送出" /></li>
												</ul>
											</div>
										</div>
									</form>
						</div>
					</div>

				</div>

			</section>

		<!-- Footer -->
 			<?php include("footer.php"); ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

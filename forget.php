<?php 
session_start();
$link = mysqli_connect("localhost","root","root123456","group02")
or die ("無法開啟資料庫<br/>");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
@$memberId=$_POST['demo-memberId'];
@$email=$_POST['demo-email'];
$sql = "SELECT * FROM  member where memberId='$memberId' and email='$email' ";
if (isset($_POST['demo-memberId'])&&isset($_POST['demo-email'])) 
        {   
        	if ( $result = mysqli_query($link, $sql))
        	{	
               if ($row = mysqli_fetch_assoc($result)) 
               {
                  $sql = "SELECT * FROM  member where memberId='$memberId' and email='$email' ";                                     
                  $row = mysqli_fetch_assoc($result) ;  
                 if (isset($_POST['demo-password']))
					{
    					$sql = "UPDATE member SET password = '".$_POST['demo-password']."' where memberId = '".$_POST['demo-memberId']."'";
						if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    						{
    	   						 header("Location:index.php");
    						}
					}
               } 
               else
                {
                  echo "<script>alert('輸入帳號或信箱錯誤啦'); window.location.href=\"forget.php\"; </script>";
               }
            }
           mysqli_free_result($result); // 釋放佔用的記憶體
        }
mysqli_close($link);


?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>會員資訊 - 忘記密碼</title>
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
						<div class="row 200%">
							<div class="6u$ 12u$(medium)">
								<!-- Form -->
									<h2><strong>忘記密碼</strong></h2>

									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u$ 12u$(xsmall)">
												<label for="memberId">MemberId</label>
												<input type="text" name="demo-memberId" id="demo-memberId" value="" placeholder="memberId" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="email">Email</label>
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<label for="password">NewPassword</label>
												<input type="text" name="demo-password" id="demo-password" value="" placeholder="Password" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="SEND!" /></li>
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
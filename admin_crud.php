<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "group02")or die ("cannot found database :( ") ;

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
include("check.php");
?>

<!DOCTYPE html>
<html>
	<head>
	<title>管理員權限 | NCUEcourses</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<?php include("header.php"); ?>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
					<h3><a href="datatable_member.php">會員資料管理</a></h3>
					<h3><a href="datatable_course.php">通識課程管理</a></h3>
					<h3><a href="datatable_comment.php">留言版管理</a></h3>
					</header>
					

				</div>
			</section>

		<!-- Footer -->
			<?php include("footer.php");?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

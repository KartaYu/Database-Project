<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
include("check.php");
?>
<html>
	<head>
		<title>ABOUT US | NCUEcourses</title>
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
						<h2>關於我們</h2>
						<p>關於團隊，關於這個平台的故事</p>
					</header>
					<div class="image round left">
						<img src="images/pic01.jpg" alt="Pic 01" />
					</div>
					<p>故事的起源，來自於2019年秋天的一門必修課。<br><br>
					「你是否曾有過，很想修一門通識課卻不知道他的評價好壞的時候呢？』<br>
					每到選課時期，學生們總是需要四處打聽詢問學長姐的修課心得，然而卻始終無法得到有效且可靠的資訊，
					鑒於目前校內仍缺乏一個這樣的平台，我們希望可以將這個需求實現，讓學生可以隨時隨地發表通識心得，
					更可以方便快速地查詢選課評價，順利修到自己最想選修的通識課程。
					</p>

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
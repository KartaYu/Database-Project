<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");


// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$courseId = $_GET['courseId'];
$sql= "SELECT * FROM courseInfo where courseId = $courseId ";
include("check.php");
include("permission_mem.php") ;

//資料庫新增存檔
$msg="";
$time=date("Y-m-d H:i:s");
if (isset($_POST['context'])){
	$sql = "insert into comment(`courseId`,`memberId`,`year`, `semester`, `score1`,`score2`, `score3`, `context`,`comTime`) 
			values ('" . $courseId . "','" . $_POST['memberId'] . "','" . $_POST['year'] . "','" . $_POST['semester'] . "','" . $_POST['score1'] . "','" . $_POST['score2'] . "','" . $_POST['score3'] . "','" . $_POST['context'] . "','" . $time . "')";

	if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
	{
		// $msg = "<span style='color:#0000FF'>留言成功!<br><a href='comment.php?courseId=$courseId'>點此返回上頁</a></span>";
		echo "<script> alert('留言成功！系統將返回留言畫面'); </script>";
		$url = "comment.php?courseId= $courseId ";
		echo "<script type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>"; 
	}
	else
	{
		$msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
	}
}

?>
<html>
	<head>
		<title>填寫修課心得 | NCUEcourses</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">
	<?php
// 送出查詢的SQL指令
$sql= "SELECT * FROM courseInfo where courseId = $courseId ";
if ($result = mysqli_query($link, $sql)) {
	while($row = mysqli_fetch_assoc($result)) { 
?>
		<!-- Header -->
			<?php include("header.php"); ?>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>填寫修課心得</h2>
						<p>一起把修過的課，寫成評價回饋大家吧！</p>
						<?php echo $msg;?>
					</header>

			<form method="POST" action="">
			<h4>課程代碼： 00<?php echo $row["courseId"]; ?></h4>
			<h4>課程名稱： <?php echo $row["courseName"]; ?></h4>
			<h4>授課老師： <?php echo $row["teacher"]; ?></h4>
			<div class="3u$">
					<label for="memberId">學號</label>
					<div class="">
						<input type="text" id="memberId" name="memberId" required>
					</div>
					</div>
			
			<div class="3u$">
					<label for="year">修課學年</label>
					<div class="select-wrapper">
						<select name="year" id="year">
							<option value="">--</option>
							<option value=108>108</option>
							<option value=107>107</option>
							<option value=106>106</option>
							<option value=105>105</option>
							<option value=104>104</option>
						</select>
					</div>
					<label for="semester">修課學期</label>
					<div class="select-wrapper">
						<select name="semester" id="semester">
							<option value="">--</option>
							<option value=1>1</option>
							<option value=2>2</option>
						</select>
					</div>
				</div>
				<P></P>
				<p>以下為課程三面向綜合評分，5分最高，1分最低，請務必依照修課感想填寫：</p>
				<div class="3u$">
					<label for="score1">課程扎實度</label>
					<div class="select-wrapper">
						<select name="score1" id="score1">
							<option value="">--</option>
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
							<option value=4>4</option>
							<option value=5>5</option>
						</select>
					</div>
				</div>
				<p></p>
				<div class="3u$">
					<label for="score2">課程甜度</label>
					<div class="select-wrapper">
						<select name="score2" id="score2">
							<option value="">--</option>
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
							<option value=4>4</option>
							<option value=5>5</option>
						</select>
					</div>
				</div>
				<P></P>
				<div class="3u$">
					<label for="score3">課程涼度</label>
					<div class="select-wrapper">
						<select name="score3" id="score3">
							<option value="">--</option>
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
							<option value=4>4</option>
							<option value=5>5</option>
						</select>
					</div>
				</div>
				<p></p>

				<div class="field">
					<label for="context">評論內容</label>
					<textarea name="context" id="context" rows="6" placeholder="評論..." required></textarea>
				</div>
				<div>
					<input type="submit" value="送出">
					<input type="reset" name="clear" value="重設">
				</div>
			</form>
			

				</div>
			</section>

		<!-- Footer -->
			<?php include("footer.php");?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	<?php } mysqli_free_result($result);  } mysqli_close($link);?> 
	</body>
</html>



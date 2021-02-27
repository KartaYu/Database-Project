<?php

$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if (! empty($_GET['courseId']))
	$courseId = $_GET['courseId'];
$sort="";
$sql= "SELECT * FROM courseInfo where courseId=$courseId $sort ";
session_start();
include("check.php");


?>

<!DOCTYPE HTML>
<html>
<head>
<?php
// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
	while($row = mysqli_fetch_assoc($result)) { 
?>
	<title>課程評價 - <?php echo $row["courseName"]; ?></title>
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
		<section class="12u$ 24u$(medium)">
		
			<div class="row 100%">
				<section class="12u$ 24u$(medium)">
					<!-- Title -->
					<h2><strong><?php echo $row["courseName"]; ?></strong></h2>
					<p>授課教授：<b><?php echo $row["teacher"]; ?></b> 教授
					<?php echo'<a href="insert.php?courseId='.$courseId.'" class="button">我要填寫心得</a>';?></p>
					<?php }  }?>
					<?php
						$sqlstr="SELECT * FROM comment where courseId = $courseId;";
						$result=mysqli_query($link,$sqlstr);
						$head=mysqli_fetch_assoc($result);
						$j=1;
						$score1=0;
						$score2=0;
						$score3=0;
						while($test=mysqli_fetch_assoc($result))
						{
							$score1+=$head['score1'];
							$score2+=$head['score2'];
							$score3+=$head['score3'];
						$j++;}
						$score1/=$j;
						$score2/=$j;
						$score3/=$j;
						echo "<b>【課程三面向評分】</b><br>";
						echo "　扎實度平均分：".round($score1,1);
						echo '<br>'; 
						echo "　甜度平均分：".round($score2,1);
						echo '<br>'; 
						echo "　涼度平均分：".round($score3,1);
						echo '<br><br>'; 
					?>

					<!-- Content -->
					<h3>學生評論</h3>
					<form method="post" action="">
						<div class="24u$">

							<div class="row uniform">
								<div class="select-wrapper">
									<select name="demo_category" id="demo-category">
										<option value="1">依時間升序</option>
										<option value="2">依時間降序</option>
										<option value="3">依課程扎實度升序</option>
										<option value="4">依課程扎實度降序</option>
										<option value="5">依課程甜度升序</option>
										<option value="6">依課程甜度降序</option>
										<option value="7">依課程涼度升序</option>
										<option value="8">依課程涼度降序</option>
									</select>
								</div>
								<div class="2u 12u$(small)">
								<input type="submit" value="排序" class="fit" />
								
                            </div>
							</div>
							<?php 
							$demo_category = 0;
							if(isset($_POST['demo_category'] )){
								$demo_category = $_POST['demo_category'];
							}?>
							<ul class="alt">
								<li>
									<?php
										if(empty ($demo_category)){
											$sort = "";
											$demo_category == 0;
										}
										if($demo_category == 1){
											$sort = "ORDER BY `comTime` ASC";
										}
										if($demo_category == 2){
											$sort = "ORDER BY`comTime` DESC";
										}
										if($demo_category == 3){
											$sort = "ORDER BY `score1` ASC";
										}
										if($demo_category == 4){
											$sort = "ORDER BY `score1` DESC";
										}
										if($demo_category == 5){
											$sort = "ORDER BY `score2` ASC";
										}
										if($demo_category == 6){
											$sort = "ORDER BY `score2` DESC";
										}
										if($demo_category == 7){
											$sort = "ORDER BY `score3` ASC";
										}
										if($demo_category == 8){
											$sort = "ORDER BY `score3` DESC";
										}
										$sql= "SELECT * FROM comment where courseId=$courseId $sort ";
										$result = mysqli_query($link, $sql);
										if (!$result) {
											printf("Error: %s\n", mysqli_error($link));
											exit();
										}
										$no =1;
                                        if (! mysqli_num_rows($result)) {
                                            echo "<tr>查無資料</tr>";
                                        }else{
                                            while ($row = mysqli_fetch_array($result)) {
                                            echo "<div class=\"image round left\">";
                                            echo "<img src=\"images/male.jpg\" alt=\"p1\" />";
							                echo "</div>";
							                echo "<p>留言編號" . $no++ . "</p>";
											echo "<p>留言時間：" . $row['comTime'] . "</p>";
											echo "<p>修課學期：<b>" . $row['year'] . "</b> 年  <b>" . $row['semester'] . "</b> 學期</p>";
							                						
											echo "<p><h4>評論內容</h4></p>";
											echo "<p>課程扎實度：" . $row['score1'] . " 　/　課程甜度：" . $row['score2'] . " 　/　課程涼度：" . $row['score3'] . "</p>";
                                            echo "<p>" . $row['context'] . "</p>";	
                                            echo "<HR>";
                                          }
                                        }
                                    ?>
									<?php mysqli_free_result($result); ?> 
								</li>
							</ul>

						</div>
					</form>

				</section>

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
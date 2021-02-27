<?php
$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");
// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
$sqlstr="SELECT * FROM comment;";
$result=mysqli_query($link,$sqlstr);
//var_dump($result);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>資訊素養</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<script type="text/javascript">
//var data_list_array=new Array[100];//本來想說存讚的數量回資料庫 但還沒做完
function change(num)//使讚數能夠正常顯示
{
	$j=num;
	var ele;
	var comment;	
	ele = document.getElementById("butpraise"+num);
	comment=document.getElementById("com"+num);
if (ele.value=="Like")//如果下面留言欄位value為like則改為unlike(代表沒按過),讚數加1
{
ele.value = "UnLike";
number=parseInt(comment.innerText);
number+=1;
//data_list_array[$j-1]=number;
comment.innerText= number.toString();
}
else//如果下面留言欄位value為like則改為unlike(代表按過),讚數減1
{
ele.value = "Like";
number=parseInt(comment.innerText);
number-=1;
//data_list_array[$j-1]=number;
comment.innerText= number.toString();
}

}
</script>
</head>
<body class="subpage" onload="">
<!-- Header -->
<header id="header">
<div class="inner">
<a href="index.html" class="logo"><h3><strong>選課評價系統</strong></h3></a>
<nav id="nav">
	<a href="index.html">首頁</a>
	<a href="login.html">登入/註冊</a>
	<a href="content.html">課程評價</a>
</nav>
<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
</div>
</header>
<!-- Main -->
<section id="main" class="wrapper">
<div class="inner">					
	<div class="row 100%">
		<section class="12u$ 24u$(medium)">
		<?php
		$head=mysqli_fetch_assoc($result);
		$sqlstr1="SELECT AVG(score1) FROM `comment`;";
		$sqlstr2="SELECT AVG(score2) FROM `comment`;";
		$sqlstr3="SELECT AVG(score3) FROM `comment`;";
		echo "課程為 : ".$head['courseId'];
		echo '<br>'; 
		echo "扎實度平均分為 : "."$sqlstr1";
		echo '<br>'; 
		echo "甜度平均分為 : "."$sqlstr2";
		echo '<br>'; 
		echo "涼度平均分為 : "."$sqlstr3";
		?>
		<?php
		$i=1;
		while($row = mysqli_fetch_assoc($result)) {//動態載入留言
		?>			
			<!-- Content -->
			<h3>學生評論</h3>
			<div class="24u$">								
			<ul class="alt">
			<li>
			<div class="image round left">
			<img src="images/male.jpg" alt="p1" />
			</div>
			<p>系級:<span id="course_id"><?php echo $row['year']?></span><div style="text-align:right;"><input type="button"style="background-color: transparent;" value="Like"  id="butpraise<?php echo $i; ?>" onclick="change(<?php echo $i;?>);"></input><span id="com<?php echo $i;?>"><?php echo $row['praise']?></span></p></div>
			<p>留言時間:<span id="comment_time"><?php echo $row['comTime'];?></span></p>
			<p>課程評分:<div id="score"><?php echo "評分扎實度:".$row['score1'].'<br>'. "評分涼度:".$row['score2'].'<br>'."評分甜度:".$row['score3'];?></div></p>
			<h4>評論內容:<span id="context"><?php echo $row['context']; ?></span></h4>
			</li>
			<hr/>
		<?php $i++;} ?>
		</ul>

		</div>
			
		</section>

	</div>

</div>

</section>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
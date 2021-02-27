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
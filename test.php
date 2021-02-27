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
<div style="text-align: center;"><?php
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
		echo "課程為 : ".$head['courseId'];
		echo '<br>'; 
		echo "扎實度平均分為 ".round($score1,1);
		echo '<br>'; 
		echo "甜度平均分為 :".round($score2,1);
		echo '<br>'; 
		echo "涼度平均分為 :".round($score3,1);
?></div>
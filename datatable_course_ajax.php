<?php

$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from courseinfo";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["courseId"], $row["courseName"], $row["courseType"], $row["teacher"], 
                  "<button type='button' class='btn btn-warning btn-xs' id='btn_update'>
                  <i class='glyphicon glyphicon-pencil'></i>修改</button> 
                  <button type='button' class='btn btn-danger btn-xs' id='btn_delete'>
                  <i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into courseinfo(courseId,courseName,courseType,teacher) 
      values ('" . $_POST['courseId'] . "','" . $_POST['courseName'] . "','" . $_POST['courseType'] . "','" . $_POST['teacher'] . "')";
}

if ($oper == "update") {
      $sql = "update courseinfo set courseName='" . $_POST['courseName'] . "',courseType='" . $_POST['courseType'] . "',teacher='" . $_POST['teacher'] . "' where courseId='" . $_POST['courseId_old'] . "'";
}

if ($oper == "delete") {
      $sql = "delete from courseinfo where courseId='" . $_POST['courseId_old'] . "'";
}

if (strlen($sql) > 10) {
      if ($result = mysqli_query($link, $sql)) {
            $a["code"] = 0;
            $a["message"] = "資料" . $arr_oper[$oper] . "成功!";
      } else {
            $a["code"] = mysqli_errno($link);
            $a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}
?>
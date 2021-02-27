<?php
// session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");


if ($result = mysqli_query($link, "SELECT * FROM member")) {
    while ($row = mysqli_fetch_assoc($result)) {      
            if (@$_POST['memberId'] == "admin" && @$_POST['password'] == "admin123456") {
            $_SESSION['memberId'] = "admin";
            $_SESSION['permission'] = 2; //管理者
            
            }
            if(@$_POST['memberId'] == $row["memberId"] && @$_POST['password'] == $row["password"])
            {
                $_SESSION['memberId'] = $_POST['memberId'];
                $_SESSION['permission'] = 1; //會員

                
            }                        
        } 

    mysqli_free_result($result); // 釋放佔用的記憶體
}

?>
<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group02") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
include("check.php");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>課程總覽</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="subpage">
    <!-- Header -->
    <?php include("header.php"); ?>

    <!--search from-->
    <section id="main" class="wrapper">
        <div class="inner">
            <form method="get" action="#">
                <div class="row uniform">
                    <div class="3u 12u(small)">
                        <input type="text" name="courseId" id="query" value="" placeholder="課程代碼" />
                    </div>
                    <div class="3u 12u$(small)">
                        <input type="text" name="courseName" id="query" value="" placeholder="課程名稱" />
                    </div>
                    <div class="2u 12u(small)">
                        <input type="text" name="courseType" id="query" value="" placeholder="開課班別" />
                    </div>
                    <div class="2u 12u(small)">
                        <input type="text" name="teacher" id="query" value="" placeholder="授課教師" />
                    </div>
                    <div class="2u 12u$(small)">
                        <input type="submit" value="Search" class="fit" />
                    </div>
                </div>
            </form>
            <?php
            echo "<div class=\"table-wrapper\">
            <table>
                <thead>
                    <tr>
                        <th>課程代碼</th>
                        <th>課程名稱</th>
                        <th>開課班別</th>
                        <th>授課教師</th>
                        <th>連結</th>
                    </tr>
                </thead>
                <tbody>";?>
                    <?php
                    if (empty($_GET['courseId']))
                        $courseId ="";
                    else
                        $courseId = $_GET['courseId'];
                    if (empty($_GET['courseName']))
                        $courseName ="";
                    else
                        $courseName = $_GET['courseName'];
                    if (empty($_GET['courseType']))
                        $courseType ="";
                    else
                        $courseType = $_GET['courseType'];
                    if (empty($_GET['teacher']))
                        $teacher ="";
                    else
                        $teacher = $_GET['teacher'];

                    //有無courseId須分開處理
                    if(empty($courseId)){
                        $sql = "SELECT * FROM courseinfo WHERE `courseName` LIKE '%".$courseName."%' AND `courseType` LIKE '%".$courseType."%' AND `teacher` LIKE '%".$teacher."%'";
                    }else{
                        $sql = "SELECT * FROM courseinfo WHERE courseId = $courseId AND`courseName` LIKE '%".$courseName."%' AND `courseType` LIKE '%".$courseType."%' AND `teacher` LIKE '%".$teacher."%'";
                    }

                    $result = mysqli_query($link, $sql);
                    $demo_category="";
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error($link));
                        exit();
                    }
                    if (mysqli_num_rows($result) <= 0) {
                        echo "<tr><td colspan='5'>查無資料</td></tr>";
                    }else{
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['courseId'] . "</td>";
                            echo "<td>" . $row['courseName'] . "</td>";
                            echo "<td>" . $row['courseType'] . "</td>";
                            echo "<td>" . $row['teacher'] . "</td>";
                            echo '<td><a href="comment.php?courseId='.$row['courseId'].'&demo_category='.$demo_category.'">前往</td>';
                            echo "</tr>";
                        }
                    }
                    ?>
            <?php
            echo "</tbody>
            </table>
            </div>";
            ?>        
        </div>
    </section>
</body>
<?php include("footer.php"); ?>
</html>
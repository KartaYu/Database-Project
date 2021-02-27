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
    <title>NCUE Courses</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

    <!-- Header -->
	<?php include("header.php"); ?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <header>
                <h1>彰師通識選課評價平台</h1>
            </header>

            <div class="flex ">

                <div>
                    <span class="icon fa-car"></span>
                    <h3>博雅一</h3>
                    <p></p>
                </div>

                <div>
                    <span class="icon fa-camera"></span>
                    <h3>博雅二</h3>
                    <p></p>
                </div>

                <div>
                    <span class="icon fa-bug"></span>
                    <h3>博雅三</h3>
                    <p></p>
                </div>

            </div>

            <footer>
                <a href="course.php" class="button">Start</a>
            </footer>
        </div>
    </section>


    <!-- Three -->
    <section id="three" class="wrapper align-center">
        <div class="inner">
        <h3>熱門討論</h3>
            <div class="flex flex-2">
                <article>
                    <div class="image round">
                        <img src="images/pic01.jpg" alt="Pic 01" />
                    </div>
                    <header>
                        <h3>資訊素養</h3>
                        <p>授課教授：黃其泮 老師</p>
                    </header>
                    <p>「老師很認真，課程札實，很好拿分的好課！」</p>
                    <p>「每堂課都有作業，但分數給很甜。」</p>
                    <p>「會點名，但修完可以抵畢業門檻蠻方便ㄉ : )」</p>
                    <footer>
                        <a href="comment.php?courseId=271" class="button">More info</a>
                    </footer>
                </article>
                <article>
                <div class="image round">
                        <img src="images/pic02.jpg" alt="Pic 02" />
                    </div>
                    <header>
                        <h3>急難救助教育</h3>
                        <p>授課教授：周志中 老師</p>
                    </header>
                    <p>「寶山上課，出席占分數比重很大，缺席超過三次就蠻危險的。」</p>
                    <p>「只要是操作課，基本上都不能請假，不然會沒成績～」</p>
                    <p>「學的東西很重要很實用，推給想認真上課的同學。」</p>
                    <footer>
                        <a href="comment.php?courseId=240" class="button">More info</a>
                    </footer>
                </article>
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
<?php
mysqli_close($link); // 關閉資料庫連結
?>
<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "group02")or die ("cannot found database :( ") ;

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
include("check.php");
$memberId = $_SESSION['memberId'];
?>

<!DOCTYPE html>
<html>
	<head>
	<title>歷史留言管理 | NCUEcourses</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="datatable_info.js"></script>
<style>
body {
    font-family: "微軟正黑體";
}

.error {
    color: #D82424;
    font-weight: normal;
    display: inline;
    padding: 1px;
}
</style>
	</head>
	<body class="subpage">

		<!-- Header -->
			<?php include("header.php"); ?>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center"> <h3>個人資料管理</h3> </header>
					<div class="row">
        <div class="col-md-2"></div>
            <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="memberId_old" id="memberId_old" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <tr>
							<th class="text-center">學號</th>
                            <th class="text-center">使用者名稱</th>
                            <th class="text-center">真實姓名</th>
                            <th class="text-center">系所</th>
                            <th class="text-center">電子郵件</th>
                            <th class="text-center">密碼</th>
                            <th class="text-center">存檔</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <input type="text" id="memberId" name="memberId" style="width:130px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="nickName" name="nickName" style="width:130px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="name" name="name" style="width:130px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="department" name="department" style="width:130px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="email" name="email" style="width:130px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="password" name="password" style="width:130px">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>存檔</button>
                            </td>
                        </tr>
                    </thead>
                </table>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
							<th class="text-center">學號</th>
                            <th class="text-center">使用者名稱</th>
                            <th class="text-center">真實姓名</th>
                            <th class="text-center">系所</th>
                            <th class="text-center">電子郵件</th>
                            <th class="text-center">密碼</th>
                           <th class="text-center" width="150px">修改 / 刪除</th>
                        </tr>
                    </thead>
                </table>
        <div class="col-md-2"></div>
    </div>

	</div>
	</section>

		<!-- Footer -->
			<?php include("footer.php");?>


	</body>
</html>
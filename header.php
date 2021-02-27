<header id="header">
        <div class="inner">
            <a href="index.php" class="logo"><strong> NCUE COURSES</strong></a>
            <nav id="nav">
                <a href="index.php">首頁</a>
                <a href="about.php">系統簡介</a>
                <a href="course.php">課程總覽</a>
				<?php
						
						if (@$_SESSION['permission']==1)
						{
						
							echo '<a href="mem_crud.php">您好，&nbsp;'.$_SESSION['memberId'].'</a>
								
								<a href="logout.php"><span> </span>登出</a>';
						}
						else if (@$_SESSION['permission']==2)
						{
							echo '<a href="admin_crud.php">管理者&nbsp;'.$_SESSION['memberId'].'</a>
								<a href="logout.php"><span> </span>登出</a>';
						}
						else
						{
							echo '<a href="login.php">會員登入</a>';
						}
					?>
            </nav>
            <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
    </header>
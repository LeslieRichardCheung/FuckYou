<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>Fuck♂You - 首页</title>
    <link rel="stylesheet" href="main.css" type="text/css" />
    <script src="jquery.min.js"></script>
    <script>
        alert('本论坛讨论但不限于Java、PHP、C++、JavaScript等编程语言,有兴趣者可添加论坛管理者QQ:2227100493');
        var i = 0;
        $(function() {
            $("button.sat").click((event)=>{
                $("div.tz").css("display", "block");
                $("div.tzs").css("display", "none");
                $(this).css("display", "none");
                console.log("clicked");
            });
        });
        var center=(aname)=>{window.location.href='center.php?aname='+aname}
    </script>
    <link rel="icon" href="icon.ico" type="image/x-icon">
</head>

<body style='background-image:url(bg.jpg);'>
    <!--
    <script>
        if (window.screen.width < 1200) {
            location.href = '';//如果是手机端则跳转页面
        }
    </script>
    -->
    <div align='right'>
        <?php
        if ($_SESSION['logined']) {
            echo "<img src='profile_image.jpg' id='profile' onclick='center(\"".$_SESSION['userName']."\")'/>\n";
        }
        ?>
    </div>
    <div class="field1" align="center" id="field1">
        <div class="tt1" align="center">
            <h1>Fuck♂You</h1>
        </div>
        <?php
        include 'functions.php';
        showTiezi('./tiezi/'); //显示所有帖子
        ?>
    </div><br />
    <?php
    if ($_SESSION['logined'] == false) { //如果没有登录则不显示发帖区域
        echo "<div style='background-color:orange;width:26em;margin: 0 auto;border-radius:1em;'>";
        echo " <span>你还没有登录，你可以<a href='login.php'>登录</a></span>";
        echo "</div>";
        die();
    }
    ?>
    <!--底部发帖区域-->
    <div id='tt1'>
        <div>
            <form method="POST" action="sent.php">
                <br /><input type='text' name='t_title' required="required" id='t_title' placeholder="帖子的标题" /><br />
                <textarea name='t_doc' required="required" id='t_doc' placeholder="帖子的内容"></textarea><br />
                <input type='submit' value='发帖' />
            </form>
        </div>
    </div>
</body>

</html>
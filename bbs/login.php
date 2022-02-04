<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8" />
    <style>
        body {
            text-align: center
        }

        .field1 {
            background-color: gray;
            width: 30rem;
            margin: 0 auto;
            border-radius: 1rem;
        }

        .tt1 {
            background-color: orange;
            width: 13em;
            height: 3em;
            margin: 0 auto;
            border-radius: 1em;
        }
    </style>
    <script src="jquery.min.js"></script>
    <link rel="icon" href="icon.ico" type="image/x-icon">
</head>

<body style='background-image:url(bg.jpg);'>
    <div id="tt1" class="tt1" align="center" onclick="console.log('最好不要乱搞哦')">
        <h1>Fuck♂You</h1>
    </div>
    <?php
    $con = mysqli_connect("localhost", "root", "root", "mydb");
    $cmd = "select * from user";
    $res = mysqli_query($con, $cmd);
    $is = false;
    if ($_POST['aname'] != '') {
        while ($usr = mysqli_fetch_assoc($res)) {
            if (
                $_POST["aname"] == $usr['userName'] &&
                $_POST["apass"] == $usr['userPass']
            ) {
                echo "<title>Fuck♂You - 你好</title>";
                echo "<h1 style='color:white'>你好，欢迎回来</h1>";
                echo "<a href='index.php' style='color:white'>点击回到首页</a>";
                $is = true;
                $_SESSION['logined'] = true;
                $_SESSION['userName'] = $_POST['aname'];
                break;
            }
        }
        if (!$is) {
            echo "<title>Fuck♂You - 抱歉，账号不存在</title>";
            echo "<script>alert('账号不存在或用户名密码错误')</script>";
        }
        die();
    }
    echo "<title>Fuck♂You - 请登录</title>";
    ?>
    <div class="field1" align="center" id="field1">
        <h1>请登录</h1>
        <form action="#" method="POST" class="form1"><br>
            <p>名称<input name="aname" type="text" id="i1" required="required" /></p>
            <p>密码<input name="apass" type="password" id="i2" required="required" /></p>
            <input type="submit" value="点击登录" />
        </form>
    </div>
    <a href="register.php">没有账号？点击获取</a>
</body>

</html>
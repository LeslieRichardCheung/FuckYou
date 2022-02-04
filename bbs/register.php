<!DOCTYPE html>

<head>
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
    <title>Fuck♂You - 注册</title>
    <style>
        body {
            text-align: center
        }

        .tt1 {
            background-color: orange;
            width: 13em;
            height: 3em;
            margin: 0 auto;
            border-radius: 1em;
        }

        .p1 {
            background-color: rgb(145, 34, 248);
        }

        span {
            color: aliceblue;
        }

        span:hover {
            background-color: rgba(160, 0, 253, 0.781);
        }

        .p2 {
            text-align: right;
        }

        .field1 {
            background-color: gray;
            width: 30rem;
            margin: 0 auto;
            border-radius: 1rem;
        }
    </style>
</head>

<body style='background-image:url(bg.jpg);'>

    <?php
    $con = mysqli_connect("localhost", "root", "root", "mydb");
    $cmd = "select * from user";
    $res = mysqli_query($con, $cmd);
    $name = $_POST['aname'];
    $pass = $_POST['apass'];
    $is = true;
    $usr = null;
    if ($name != '') { //名字不为空则表示该页面为表单处理
        while ($usr = mysqli_fetch_assoc($res)) {
            if (
                $name == $usr['userName'] &&
                $pass == $usr['userPass']
            ) {
                $is = false;
                echo "<title>Fuck♂You - 注册失败</title>";
                echo "<a href='index.php'>点击回到首页</a>";
                echo ("<script>alert('账号已存在')</script>");
                break;
            }
        }
        if ($is) {
            $query = mysqli_query($con, "insert into user(userName,userPass)value('" . $name . "','"
                . $pass . "');");
            if ($query) {
                echo "<title>Fuck♂You - 注册成功</title>";
                echo "<h1 style='color:white;'>注册成功</h1>";
                echo "<a href='index.php'>点击回到首页</a>";
            } else {
                echo "<script>alert('抱歉，注册失败');</script>";
            }
        }
        die();
    }
    ?>
    <div id="tt1" class="tt1" align="center" onclick="console.log('Normal JS part')">
        <h1>Fuck♂You</h1>
    </div>
    <div class="field1" align="center" id="field1">
        <h1>输入用户名和密码,请使用英文</h1>
        <form action="#" method="POST" class="form1"><br>
            <p>名称<input name="aname" type="text" id="i1" required="required" /></p>
            <p>密码<input name="apass" type="password" id="i2" required="required" /></p>
            <input type="submit" value="注册" />
        </form>
    </div>
</body>
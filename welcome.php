<?php
session_start();
?>

<head>
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
    <script src="jquery.min.js"></script>
    <style>
        body {
            text-align: center;
        }

        .tt1 {
            background-color: orange;
            width: 13em;
            height: 3em;
            margin: 0 auto;
            border-radius: 1em;
        }
    </style>
</head>

<body style='background-image:url(bg.jpg);'>
    <script>
        var i = 0;
        $(function() {
            $("*").keydown(function(event) {
                if (event.which == 112) {
                    if (i++ == 18) {
                        alert("彩蛋");
                        i = 0;
                    }
                }
            });
        });
    </script>
    <div id="tt1" class="tt1" align="center" onclick="console.log('Normal JS part')">
        <h1 class="tt2">Fuck♂You</h1>
    </div>
    <?php
    $con = mysqli_connect("localhost", "root", "root", "mydb");
    $cmd = "select * from user";
    $res = mysqli_query($con, $cmd);
    $is = false;
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
            $_SESSION['userName']=$_POST['aname'];
            break;
        }
    }
    if (!$is) {
        echo "<title>Fuck♂You - 抱歉，账号不存在</title>";
        echo "<script>alert('账号不存在或用户名密码错误')</script>";
    }
    ?>
</body>
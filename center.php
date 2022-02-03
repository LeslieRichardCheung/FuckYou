<?php session_start();
$name = $_GET['aname']; ?>

<head>
    <style>
        div.user {
            margin: 0 auto;
            width: 13cm;
            height: 15cm;
            background-color: white;
            border-radius: 1cm;
        }
    </style>
    <title>Fuck♂You - 用户中心</title>
    <link rel="icon" href="icon.ico" type="image/x-icon">
</head>

<body style='background-image:url(bg.jpg);text-align:center;'>
    <div class='user' id='user'>
        <br />
        <h1>个人消息
            <?php
            if($name==$_SESSION['userName']){
                echo "(我的账号)";
            }
            ?>
        </h1>
        <hr />
        <?php
        echo "<div>";
        echo "<p>用户名：" . $name . "</p><hr/>";
        echo NULL;
        echo "</div>";
        ?>
    </div>
</body>
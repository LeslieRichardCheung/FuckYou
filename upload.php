<?php
if ($_FILES["fn"]["error"] > 0) {
    echo "错误: " . $_FILES["fn"]["error"] . "<br>";
} else {
    if (file_exists($_FILES["fn"]["name"])) {
        echo $_FILES["fn"]["name"] . " 文件已经存在。 ";
    } else {
        if (move_uploaded_file($_FILES["fn"]["tmp_name"], "./" . $_FILES["fn"]["name"]))
            echo "成功";
        else
            echo "失败";
    }
}

<?php
# Created by Leslie in 2021.05.22
function ls($url = null) //used to list all files in a folder
{
    error_reporting(0); //didn't call warning
    $num = 0; //the number of files
    $dir = opendir($url);
    while (false !== ($file = readdir($dir))) {
        if ($file == '.' || $file == '..' || $file == 'protoTemplate.php') {
            continue;
        }
        $num++; //number add 1 if files exist
    }
    closedir($dir);
    return $num;
}
function findTitle($fn) //used to find the content between '<title>' to '</title>' in a file
{
    $content = file_get_contents($fn); //get content
    $postb = strpos($content, '<title>') + 7; //get '<title>'
    $poste = strpos($content, '</title>'); //get '</title>'
    $length = $poste - $postb;
    $result = substr($content, $postb, $length);
    if ($result == '') {
        return 'Error ';
    }
    return $result;
}
function findInFile(string $fn, $start, $end)
{
    $content = file_get_contents($fn); //get content
    $postb = strpos($content, $start) + strlen($start); //get start
    $poste = strpos($content, $end); //get end
    $length = $poste - $postb;
    $result = substr($content, $postb, $length);
    return $result;
}
function showTiezi(string $dir) //show all tiezi in index
{
    for ($c = ls($dir) - 1; $c >= 0; $c--) {
        $title = findTitle("./tiezi/$c.php");
        $name = findInFile("./tiezi/$c.php", "<i>by", "</i>");
        if ($c >= 8) {
            echo "<div class='tzs' style='display:block'>";
            echo "<a href='tiezi/$c.php'>$title</a>";
            echo "<div class='author' align='right'>";
            echo "<i>by $name</i></div>";
            echo "</div>";
            echo "<div class='tz' style='display:none;'>";
            echo "<a href='tiezi/$c.php'>$title</a>";
            echo "<div class='author' align='right'>";
            echo "<i>by $name</i></div>";
            echo "</div>";
        } else if ($c < 8) {
            echo "<div class='tz' style='display:block;'>";
            echo "<a href='tiezi/$c.php'>$title</a>";
            echo "<div class='author' align='right'>";
            echo "<i>by $name</i></div>";
            echo "</div>";
            echo "<style>.sat{display:none;}</style>";
        }
    }
    echo "<button class='sat'>点击加载所有帖子</button>";
}

<style>
    a,a:link,a:visited{
        color:blue;
    }
</style>
<div>
<?php
function ls($url = null) //used to list all files in a folder
{
    error_reporting(0); //didn't call warning
    $num = 0; //the number of files
    $dir = opendir($url);
    while (false !== ($file = readdir($dir))) {
        if ($file == '.' || $file == '..'||$file=='index.php'||$file=='upload.php'||$file=='play.php') {
            continue;
        }
        echo <<<EOF
        <div><a href="play.php?fn=$file" target='_blank'>$file</a><br/><a href="$file" download>下载</a></div>\n
        EOF;
    }
    closedir($dir);
    return $num;
}
ls("./")
?>
</div>
<div>
    <form method='post' action='upload.php' enctype="multipart/form-data">
        <input type='file' name='fn'/>
        <input type='submit'>
    </form>
</div>
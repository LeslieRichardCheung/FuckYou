<?php
session_start();
if(!$_SESSION['logined']){
    echo "<h1>失败</h1>";
    exit("<script>alert('你还没有登录');</script>");
}
include "functions.php";
$content=nl2br($_POST['t_doc']);
$where=$_POST['tzn'];
$src=findInFile("reply/$where.xml","<root>","<div align='center'><p>到底了。。。</p></div></root>");
$who=$_SESSION['userName'];
$fp=fopen("reply/$where.xml",'w');
fputs($fp,"<root>$src<div class='louceng'>$content<div align='right'><i>by $who</i></div></div><hr/><div align='center'><p>到底了。。。</p></div></root>");
echo "<script>location.href='tiezi/$where.php'</script>";
?>
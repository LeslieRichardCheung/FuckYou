<?php session_start() ?>
<meta charset="utf-8" />
<link rel="icon" href="icon.ico" type="image/x-icon">
<?php
include('functions.php');
$title = $_POST['t_title'];
$document = $_POST['t_doc'];
$tzn = ls('tiezi');
$stream = fopen('./tiezi/' . $tzn . '.php', 'w');
$doc =
    "<?php
    session_start();
    ?>
    <html>
    <head>
        <link rel='icon' href='../icon.ico' type='image/x-icon'>
        <meta charset='utf-8' />" . "<title>" . $title . "</title>" .
    "<style>
            body {
                text-align: center
            }
    
            .field1 {
                background-color: #ffffe0;
                width: 270mm;
                margin: 0 auto;
                border-style: solid;
                border-color: gray;
            }
            #tt1 {
                background-color: orange;
                width: 26em;
                height: 17em;
                margin: 0 auto;
                border-radius: 1em;
            }
            textarea {
                width: 23em;
                height:11em;
                resize: none;
            }
        </style>
        <link rel='icon' href='icon.ico' type='image/x-icon'>
    </head>
    
    <body style='background-image:url(../bg.jpg);'>
        <?php
        if (!\$_SESSION['logined']) {
            echo ' <span style=\'background-color:white\'>您还没有登录，您可以<a href=\'../login.php\'>登录</a></span>';
        }
        ?>
        <div class='field1' align='left'>  
        <div class='louceng'>
            <div align='left'>
            <h1>$title
                <hr />
            </h1>
            <p>" . nl2br($document) . "</p>
            </div>
            <div align='right'><i>by " . $_SESSION['userName'] . "</i></div><hr/>
        </div><div id='reply'></div>
        <script>
            function loadXMLDoc(url) {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('reply').innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open('GET', url, true);
                xmlhttp.send();
            }
            loadXMLDoc('../reply/$tzn.xml');
        </script></div><?php
        if (!\$_SESSION['logined']) {
            echo '<div style=\"background-color:orange;width:26em;margin: 0 auto;border-radius:1em;\">';
            echo ' <span>你还没有登录，你可以<a href=\"login.php\">登录</a></span>';
            echo '</div>';
            exit();
        }
        ?><div id='tt1'>
        <form method='POST' action='../reply.php'>
            <br/><textarea name='t_doc' required='required' id='t_doc' placeholder='回复的内容'></textarea><br />
            <input type='text' value='$tzn' style='display:none' name='tzn'>
            <input type='submit' value='发帖' />
        </form>
    </div>
    </body></html>";
$r = fputs($stream, $doc);
if ($r) {
    $fp=fopen("reply/$tzn.xml",'w');
    fputs($fp,"<root><div align='center'><p>到底了。。。</p></div></root>");
    echo '<a href="index.php">成功，点击回到首页</a>';
} else {
    echo "<a href='index.php'>失败</a>";
}
?>
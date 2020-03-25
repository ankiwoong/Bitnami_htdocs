<?php
$dir = 'C:\Bitnami\wampstack-7.3.13-0\apache2\htdocs\etc';
file_put_contents($dir.$_GET['title'], $_GET['descrition'])
    // echo "<p>title : ".$_GET['title']."</p>";
    // echo "<p>description : ".$_GET['descrition']."</p>";
?>
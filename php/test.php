<?php
    $dir = 'C:\Bitnami\wampstack-7.3.15-2\apache2\htdocs\etc';
    $list = scandir($dir);
    $i = 0;
    while($i < 3) {
        echo "<li>$list[$i]</li>\n";
        $i = $i + 1;
    }
?>
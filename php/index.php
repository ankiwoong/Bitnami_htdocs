<?php
    function print_title() {
        if(isset($_GET['id'])) {
            echo $_GET['id'];
        } else {
            echo "Welcome";
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
    print_title();
    ?>
    </title>
</head>

<body>
    <h1><a href="http://localhost/php/index.php">WEB</a></h1>
    <ol>
        <?php
            // $dir = 'C:\Bitnami\wampstack-7.3.15-2\apache2\htdocs\etc';
            $dir = 'C:\Bitnami\wampstack-7.3.13-0\apache2\htdocs\etc';
            $list = scandir($dir);
            $i = 0;
                while($i < count($list)){
                    if($list[$i] != '.') {
                        if($list[$i] != '..') {
                            echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
                        }
                    }
                    $i = $i + 1;
                  }
            // echo "<li>$list[0]</li>\n";
            
        ?>
    </ol>
    <h2>
        <?php
        print_title();
        ?>
    </h2>
    <?php
        if(isset($_GET['id'])) {
            echo file_get_contents("http://localhost/etc/".$_GET['id']);
        } else {
            echo "Hello, PHP";
        }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $password = $_GET["password"];
        if($password == "1111"){
            echo "안녕하세요. 주인님.";
        } else {
            echo "뉘신지?";
        }
    ?>
</body>

</html>
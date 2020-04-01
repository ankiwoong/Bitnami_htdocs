<?php
  $conn = mysqli_connect("localhost:3306", "root", "1q2w3e4r5t");
  mysqli_select_db($conn, "opentutorials");
  $name = mysqli_real_escape_string($conn, $_GET['name']);
  $password = mysqli_real_escape_string($conn, $_GET['password']);
  $sql = "SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
  echo $sql;
  $result = mysqli_query($conn, $sql);
?>
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
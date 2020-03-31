<?php
    $conn = mysqli_connect("localhost:3306", "root", "1q2w3e4r5t");
    mysqli_select_db($conn, "opentutorials");
    $sql = "INSERT INTO topic (title,description,author,created) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$_POST['author']."', now())";
    $result = mysqli_query($conn, $sql);
    header('Location: http://localhost/sql_php/index.php');
?>
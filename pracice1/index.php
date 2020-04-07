<!--
connection
DB선택
SELECT
INSERT
DELETE
UPDATE
-->
<!-- connection -->
<?php
    $conn = mysqli_connect('localhost:3306', 'root', '1q2w3e4r5t');
    mysqli_select_db($conn, 'opentutorials2');
    $sql = "SELECT * FROM `topic`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        echo '<a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a><br />';
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM topic WHERE id=".$id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['title'];
    echo '<br />';
    echo $row['description'];
    echo '<br />';
    echo $row['created'];
    echo '<br />';
    echo $row['author'];
    echo '<br />';
?>
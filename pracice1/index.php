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
    $conn = mysqli_query('localhost:3306', 'root', '1q2w3e4r5t');
    mysqli_query($conn, 'opentutorial2');
    $sql = "SELECT * FROM `topic`";
    $result = mysqli_query($conn, $sql);
?>
<?php
function db_init() {
    $conn = mysqli_connect("localhost:3306", "root", "1q2w3e4r5t");
    mysqli_select_db($conn, "opentutorials");
    return $conn;
    }
?>
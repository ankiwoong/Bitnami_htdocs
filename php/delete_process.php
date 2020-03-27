<?php
    unlink('../etc/'.basename($_POST['id']));
    header('Location: ../php/index.php');
?>
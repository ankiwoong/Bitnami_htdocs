<?php
    unlink('../etc/'.$_POST['id']);
    header('Location: ../php/index.php');
?>
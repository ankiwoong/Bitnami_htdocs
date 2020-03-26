<?php
    rename('../etc/'.$_POST['old_title'], '../etc/'.$_POST['title']);
    file_put_contents('../etc/'.$_POST['title'], $_POST['description']);
    header('Location: ../php/index.php?id='.$_POST['title']);
?>
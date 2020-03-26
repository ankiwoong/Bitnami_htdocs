<?php
file_put_contents('../etc/'.$_POST['title'], $_POST['description']);
header('Location: ../php/index.php?id='.$_POST['title']);
?>
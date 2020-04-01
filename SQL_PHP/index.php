<?php
  $conn = mysqli_connect("localhost:3306", "root", "1q2w3e4r5t");
  mysqli_select_db($conn, "opentutorials");
  $result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style2.css" type="text/css" />
    <title>Index</title>
</head>

<body id="target">
    <header>
        <h1>
            <img src="../img/1.png">

            <a href="./index.php">JavaScript</a>
        </h1>
    </header>
    <nav>
        <ol>
            <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<li><a href="./index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
                }
            ?>
        </ol>
    </nav>

    <div id="control">
        <input type="button" value="white" id="white_btn" />
        <input type="button" value="black" id="black_btn" />
        <a href="http://localhost/sql_php/write.php">쓰기</a>
    </div>

    <article>
        <?php
            if(empty($_GET['id']) === false ) {
                $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
                echo '<p>'.htmlspecialchars($row['author']).'</p>';
                echo '<p>'.htmlspecialchars($row['description']).'</p>';                
            }
        ?>
    </article>

    <script src="../js/script.js"></script>
</body>

</html>
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
                    echo '<li><a href="./index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
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
        <form action="http://localhost/sql_php/process.php" method="post">
            <p>
                제목 : <input type="text" name="title">
            </p>
            <p>
                작성자 : <input type="text" name="author">
            </p>
            <p>
                본문 : <textarea name="description"></textarea>
            </p>
            <input type="submit">
        </form>
    </article>

    <script src="../js/script.js"></script>
</body>

</html>
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
                본문 : <textarea name="description" id="description"></textarea>
            </p>
            <input type="hidden" role="uploadcare-uploader" />
            <input type="submit" name="name" value="submit">
        </form>
    </article>
    <script>
    UPLOADCARE_PUBLIC_KEY = 'b672b6f12f41ce995ef3';
    </script>
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
    <script>
    var singleWidget = uploadcare.SingleWidget('[role=uploadcare-uploader]');
    singleWidget.onUploadComplete(function(info) {
        document.getElementById('description').value = document.getElementById('description').value +
            '<img src="' + info.cdnUrl + '">';
    })
    </script>
</body>

</html>
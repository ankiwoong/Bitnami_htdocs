<?php
  require("../lib/db.php");
  require("../config/config.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
  $result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="http://localhost/css/style3.css" type="`text`/css" />
    <link href="http://localhost/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Index</title>
</head>

<body id="target">
    <div class="container">
        <header class="jumbotron text-center">
            <img src="http://localhost/img/3.png" alt="숫자" class="img-circle" id="logo">
            <h1>
                <a href="./index.php">JavaScript</a>
            </h1>
        </header>

        <div class="row">
            <nav class="col-md-3">
                <ol class="nav nav-pills nav-stacked">
                    <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<li><a href="./index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
                }
            ?>
                </ol>
            </nav>

            <article>
                <?php
                    if(empty($_GET['id']) === false ) {
                        $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
                        echo '<p>'.htmlspecialchars($row['author']).'</p>';
                        echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
                    }
                ?>
            </article>

            <form action="http://localhost/sql_php/process.php" method="post">
                <div class="form-group">
                    <label for="form-title">제목</label>
                    <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요.">
                </div>

                <div class="form-group">
                    <label for="form-author">작성자</label>
                    <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적어주세요.">
                </div>

                <div class="form-group">
                    <label for="form-description">본문</label>
                    <textarea class="form-control" rows="10" name="description" id="form-description"
                        placeholder="본문을 적어주세요."></textarea>
                </div>

                <input type="submit" name="name" class="btn btn-default  btn-lg">
            </form>

            <hr>
            <div id="control">
                <div class="btn-group" role="group" aria-label="...">
                    <input type="button" value="white" onclick="document.getElementById('target').className='white'"
                        class="btn btn-default  btn-lg" />
                    <input type="button" value="black" onclick="document.getElementById('target').className='black'"
                        class="btn btn-default btn-lg" />
                </div>
                <a href="http://localhost/sql_php/write.php" class="btn btn-success  btn-lg">쓰기</a>
            </div>
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
        </div>
    </div>
    </div>

    <script src="../js/script.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>

</html>
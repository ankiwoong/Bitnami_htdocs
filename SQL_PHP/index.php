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
    <link rel="stylesheet" href="../css/style3.css" type="text/css" />
    <link href="http://localhost/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Index</title>
</head>

<body id="target">
    <header>
        <h1>
            <img src="../img/1.png">

            <a href="./index.php">JavaScript</a>
        </h1>
    </header>

    <div class="row">
        <nav class="col-md-3">
            <ol>
                <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<li><a href="./index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
                }
            ?>
            </ol>
        </nav>
        <div class="col-md-9">

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
                        echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
                    }
                ?>
            </article>

        </div>
    </div>



    <script src="../js/script.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>

</html>
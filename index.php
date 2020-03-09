<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="http://localhost\css\style.css" type="text/css" />
    <title>Index</title>
</head>

<body id="target">
    <header>
        <h1>
            <a href="http://localhost\index.php">JavaScript</a>
        </h1>
    </header>
    <nav>
        <ol>
            <?php
            echo file_get_contents("list.txt");
            ?>
        </ol>
    </nav>

    <div id="control">
        <input type="button" value="white" id="white_btn" />
        <input type="button" value="black" id="black_btn" />
    </div>

    <article>
        <?php
        if(empty($_GET['id']) == false){
          echo file_get_contents($_GET['id'].".txt");
        }
        ?>
    </article>

    <script src="http://localhost/js/script.js"></script>
</body>

</html>
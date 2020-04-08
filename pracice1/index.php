<!-- SQL DB 접속 영역 -->
<?php
    $conn = mysqli_connect('localhost:3306', 'root', '1q2w3e4r5t');
    mysqli_select_db($conn, 'opentutorials2');
?>

<!-- html 시작 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 제목영역 -->
    <header>
        <h1>생활코딩 JavaScript</h1>
    </header>

    <!-- 네비게이션 영역 -->
    <nav>
        <ol>
            <?php
                $sql = "SELECT * FROM `topic`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
                }
            ?>
        </ol>
    </nav>

    <!-- 본문 영역 -->
    <article>
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM topic WHERE id=".$id;
            $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM `topic` LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <h2><?=htmlspecialchars($row['title'])?></h2>
        <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
        <div><?=htmlspecialchars($row['description'])?></div>
    </article>
</body>
</html>
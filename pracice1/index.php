<!-- SQL DB 접속 영역 -->
<?php
    // 포트는 생략해도 좋음
    $conn = mysqli_connect('localhost:3306', 'root', '1q2w3e4r5t');
    mysqli_select_db($conn, 'opentutorials2');
?>

<!-- html 시작 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Application Class Summary</title>
    <style>
    body {
        margin: 0;
    }

    body.black {
        background-color: black;
        color: white;
    }

    header {
        border-bottom: 1px solid grey;
        padding-left: 30px;
    }

    nav {
        border-right: 1px solid grey;
        width: 200px;
        height: 500px;
        float: left;
    }

    nav ol {
        margin: 0;
        padding: 20px;
        list-style: none;
    }

    #content {
        padding-left: 20px;
        float: left;
        width: 700px;
    }
    </style>
</head>

<body id="body">
    <!-- 제목 영역 -->
    <header>
        <h1>생활코딩 JavaScript</h1>
    </header>

    <!-- 네비게이션 영역 -->
    <!-- 글 목록이 네비게이션 역활을 함 -->
    <nav>
        <ol>
            <?php
                $sql = "SELECT * FROM `topic`";
                $result = mysqli_query($conn, $sql);
                // id 가 변화함에 따라 불러오는 값이 달라짐
                while($row = mysqli_fetch_assoc($result)){
                    echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
                }
            ?>
        </ol>
    </nav>

    <!-- 본문 영역 -->
    <div id="content">
        <article>
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM topic WHERE id=".$id;
            $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM `topic` LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
            <!-- 함축적인 표현이 있음 -->
            <h2><?=htmlspecialchars($row['title'])?></h2>
            <!-- | 기호를 사용하여 연결 할 수 있음 -->
            <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
            <div><?=htmlspecialchars($row['description'])?></div>
        </article>
        <!-- 자바스크립트 구현 버튼 -->
        <input type="button" name="name" value="White" onclick="document.getElementByid('body').className=''">
        <input type="button" name="name" value="Black" onclick="document.getElementByid('body').className='black'">
    </div>
</body>

</html>
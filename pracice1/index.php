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
    <style type="text/css">
    body {
        margin: 0;
    }

    /* body class 값이 black 인 경우 배경 검정 / 글씨 흰색으로 바꿈*/
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
            // mysqli_query : mysqli_connect 를 통해 연결된 객체를 이용하여 MySQL 쿼리를 실행
            $result = mysqli_query($conn, $sql);
            // mysqli_fetch_assoc : 필드명(열이름, 키값)을 통해 데이터를 호출
            $row = mysqli_fetch_assoc($result);
        ?>
            <!-- 함축적인 표현이 있음 -->
            <!-- 제목 -->
            <h2><?=htmlspecialchars($row['title'])?></h2>
            <!-- | 기호를 사용하여 작성일자 | 작성자 표현 -->
            <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
            <!-- 내용 -->
            <div><?=htmlspecialchars($row['description'])?></div>
        </article>
        <!-- 자바스크립트 구현 부분-->
        <!-- 버튼을 클릭하면 색상 변하는 코드 구현 -->
        <input type="button" name="name" value="White" onclick="document.getElementById('body').className='white'">
        <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
    </div>
</body>

</html>
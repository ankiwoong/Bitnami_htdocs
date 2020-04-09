<!-- SQL DB 접속 영역 -->
<?php
    require_once('./conn.php');
?>

<!-- html 시작 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Application Class Summary</title>
    <link rel="stylesheet" href="http://localhost/pracice1/style.css" media="screen" title="no title" charset="utf-8">
</head>

<body id="body">
    <!-- 제목 영역 -->
    <header>
        <h1><a href="http://localhost/pracice1/index.php">생활코딩 JavaScript</h1></a>
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
            <!-- 사용자가 입력한 정보를 POST 방식으로 process.php에서 처리 -->
            <form action="http://localhost/pracice1/process.php" method="post">
                <p>
                    <!-- for에 input에 id를 주면 글씨를 클릭하면 해당 폼으로 이동한다 -->
                    <label for="title">제목 : </label>
                    <input id="title" type="text" name="title">
                </p>
                <p>
                    <label for="author">저자 : </label>
                    <input id="author" type="text" name="author">
                </p>
                <p>
                    <label for="password">암호 : </label>
                    <input id="password" type="password" name="password">
                </p>
                <p>
                    <label for="description">본문 : </label>
                    <textarea id="description" name="description" cols="30" rows="10"></textarea>
                </p>
                <p>
                    <input type="submit" value="전송">
                </p>
            </form>
        </article>
        <!-- 자바스크립트 구현 부분-->
        <!-- 버튼을 클릭하면 색상 변하는 코드 구현 -->
        <input type="button" name="name" value="White" onclick="document.getElementById('body').className='white'">
        <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
        <a href="http://localhost/pracice1/write.php">쓰기</a>
    </div>
</body>

</html>
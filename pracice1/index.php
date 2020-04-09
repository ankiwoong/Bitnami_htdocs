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
        <!-- 메인화면 이동 -->
        <h1><a href="http://localhost/pracice1/index.php">생활코딩 JavaScript</h1></a>
    </header>

    <!-- 네비게이션 영역 -->
    <!-- 글 목록이 네비게이션 역활을 함 -->
    <nav>
        <ol>
            <?php
                // Topic 테이블의 모든 컬럼 조회
                $sql = "SELECT * FROM `topic`";
                // mysqli_query : mysqli_connect 를 통해 연결된 객체를 이용하여 MySQL 쿼리를 실행
                $result = mysqli_query($conn, $sql);
                // id 가 변화함에 따라 불러오는 값이 달라짐
                 // mysqli_fetch_assoc : 필드명(열이름, 키값)을 통해 데이터를 호출
                while($row = mysqli_fetch_assoc($result)){
                    // htmlspecialchars : 특정한 특수 문자를 HTML 엔티티로 변환
                    echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
                }
            ?>
        </ol>
    </nav>

    <!-- 본문 영역 -->
    <div id="content">
        <article>
            <?php
                if(empty($_GET['id'])){
                    echo "Welcome";
                } else {
                    // mysqli_real_escape_string : php에서 제공하는 함수로 MYSQL과 커넥션을할때 String을 Escape한 상태로 만들어준다
                    $id = mysqli_real_escape_string($conn, $_GET['id']);
                    $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM `topic` LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
                    // mysqli_query : mysqli_connect 를 통해 연결된 객체를 이용하여 MySQL 쿼리를 실행
                    $result = mysqli_query($conn, $sql);
                    // mysqli_fetch_assoc : 필드명(열이름, 키값)을 통해 데이터를 호출
                    $row = mysqli_fetch_assoc($result);
                ?>
            <!-- HTML CODE 이므로 HTML CODE 처리를 한다. -->
            <!-- 제목 -->
            <h2><?=htmlspecialchars($row['title'])?></h2>
            <!-- | 기호를 사용하여 작성일자 | 작성자 표현 -->
            <!-- htmlspecialchars : 특정한 특수 문자를 HTML 엔티티로 변환 -->
            <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
            <!-- 내용 -->
            <div><?=htmlspecialchars($row['description'])?></div>
            <?php
                }
            ?>
        </article>
        <!-- 자바스크립트 구현 부분-->
        <!-- 버튼을 클릭하면 색상 변하는 코드 구현 -->
        <input type="button" name="name" value="White" onclick="document.getElementById('body').className='white'">
        <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
        <!-- 사용자가 입력할 수 있게 생성 -->
        <a href="http://localhost/pracice1/write.php">쓰기</a>
    </div>
</body>

</html>
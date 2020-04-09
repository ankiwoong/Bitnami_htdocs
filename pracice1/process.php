<?php
    // 사용자가 보낸 post 데이터를 배열로 받는다.
    // test를 보내면 출력물은 Array ( [title] => test [author] => test [description] => test )
    
    // 데이터베이스 접속
    require_once('./conn.php');
    // 저자가 user 테이블에 존재하는지 여부를 체크
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $sql = "SELECT * FROM `user` WHERE `name` = '".$author."'";
    $sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    // var_dump($result->num_rows);
    if($result->num_rows > 0){
    // 존재한다면 user.id을 알아낸다.
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
    } else {
    // 존재하지 않는다면 저자를 user 추가 후 id를 알아낸다.
        $sql="INSERT INTO user (id, name, password) VALUES(NULL, '{$author}', '{$password}');";
        $result = mysqli_query($conn, $sql);
        $user_id = mysqli_insert_id($conn);
    }
    // 제목, 저자, 본문 등을 topic 테이블에 추가
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $sql = "INSERT INTO `topic` (`id`, `title`, `description`, `author`, `created`) VALUES (NULL, '{$title}', '{$description}', '{$user_id}', now())";
    mysqli_query($conn, $sql);
    // 사용자를 index.php로 이동
    header('Location: http://localhost/pracice1/index.php');

?>
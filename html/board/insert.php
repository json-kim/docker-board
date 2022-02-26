<?php

    # db 연결
    include "../db.php";

    # POST로 받아온 값 변수에 저장
    $name = $_POST["name"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $board_name = $_POST["board_name"];

    # 변수를 사용해서 sql문 작성
    $sql = "
    INSERT INTO board (name,title,content, board_name)
    VALUES ('". $name ."','". $title ."','".$content."','".$board_name."')
    ";

    # mysql에 쿼리 수행
    $conn->query($sql);

    # mysql과의 연결 종료
    $conn->close();

?>

<script>

    location.href="list.php";

</script>
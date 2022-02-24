<?php

    # db 연결
    include "../db.php";

    # POST로 받아온 값 변수에 저장
    $name = $_POST["name"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    # 변수를 사용해서 sql문 작성
    $sql = "
    INSERT INTO board (name,title,content)
    VALUES ('". $name ."','". $title ."','".$content."')
    ";

    # mysql에 쿼리 수행
    $conn->query($sql);

    # mysql과의 연결 종료
    $conn->close();

?>

<script>

    location.href="list.php";

</script>
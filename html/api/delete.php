<?php

    # db 연결
    include "../db.php";

    # GET 방식으로 값 받아오기
    $_id = $_GET["_id"];

    # 받아온 값으로 sql 쿼리문 만들기
    $sql = "
    DELETE FROM
        board
    WHERE
        _id = ".$_id."
    ;
    ";

    # 쿼리 동작 수행
    $conn->query($sql);

    # db 연결 종료
    $conn->close();

?>
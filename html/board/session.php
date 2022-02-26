<?php

    include "../db.php";

    $id = $_POST["id"]; // session에 POST로 전달된 id값
    $pw = $_POST["pw"]; // session에 POST로 전달된 pw값

    $sql = "
    SELECT
        name
    FROM
        member
    WHERE
        id = '".$id."'
    AND
        pw = '".$pw."'
    ;
    ";

    $result = $conn->query($sql);
    $row = $result->fetch_row();

    if ($row[0] != "") {
        echo "로그인 성공 <a href='list.php'>리스트로 돌아가기</a> ";
        $_SESSION["name"] = $row[0]; // 세션의 name 변수로 홍길동 저장
    } else {
        echo "로그인 실패"; // 로그인 실패 출력
    }

    $conn->close();

?>
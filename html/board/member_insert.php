<?php

    include "../db.php";

    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];

    $check_sql = "
    SELECT
        name
    FROM
        member
    WHERE
        id = '".$id."'
    ;
    ";

    $result = $conn->query($check_sql);
    $row = $result->fetch_row();

    if ($row[0] != "") {

        echo "이미 있는 아이디입니다. 가입불가 <a href='join.php'>회원가입으로 돌아가기</a>";
        
    } else {

        $sql = "
        INSERT INTO member
            (id, pw, name)
        VALUES
            ('".$id."','".$pw."','".$name."')
        ;
        ";
        
        // echo $sql;
        // exit();

        $result = $conn->query($sql);

        echo "회원가입 성공 <a href='login.php'>로그인으로 돌아가기</a>";

    }

    $conn->close();

?>
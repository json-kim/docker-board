<?php
    session_start(); // 세션 사용한다고 선언

    $_SESSION["test"] = "123"; // 세션 변수 test 에 123값을 넣어줌

    echo $_SESSION["test"]; // 세션 변수값을 표시해줌
?>
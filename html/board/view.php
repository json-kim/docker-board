<?php

    # db 연결
    include "../db.php";

    # GET 방식으로 값 받아오기
    $_id = $_GET["_id"];

    # 카운트 업데이트 쿼리 작성
    $update_sql = "
    UPDATE
        board
    SET
        view_count = view_count + 1
    WHERE
        _id = ".$_id."
    ;
    ";

    # 카운트 업데이트 쿼리 수행
    $conn->query($update_sql);

    # 받아온 id를 가지고 select쿼리 작성
    $sql = "
    SELECT 
        _id, title, name, content
    FROM
        board
    WHERE
        _id = ".$_id."
    ;
    ";

    # select 쿼리 수행
    $result = $conn->query($sql);

    # 쿼리 결과의 로우 가져오기
    $row = $result->fetch_row();

    # db 연결 종료
    $conn->close();

?>

<html>
    <head>
        <title>뷰 화면입니다.</title>
    </head>
    <body>
        제목 : <?php echo $row[1]?> <br/>

        글쓴이 : <?php echo $row[2]?> <br/>

        내용 : <?php echo $row[3]?> <br/>

        <a href="edit.php?_id=<?php echo $_id ?>">수정</a> 
        <a href="list.php">목록으로</a>
    </body>
</html>
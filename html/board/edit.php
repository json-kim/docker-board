<?php

    // DB연결
    include "../db.php";

    // GET방식으로 _id값 받아와서 확인
    $_id = $_GET["_id"];

    // SELECT 쿼리를 작성하고 확인
    $sql = "
    SELECT
        _id, name, title, content
    FROM
        board
    WHERE
        _id = ".$_id."
    ;
    ";

    // db에 쿼리를 수행
    $result = $conn->query($sql);

    // 쿼리 결과에서 로우 가져오기
    $row = $result->fetch_row();

    // db연결 종료
    $conn->close();
?>

<html>
    <head>
        <title>나만의 게시판</title>
    </head>
    <body>

    <form action="update.php" method="post">

        작성자 : <input type="text" name="name" value="<?php echo $row[1]?>"><br/>
        제목 : <input type="text" name="title" value="<?php echo $row[2]?>"><br/>
        내용 : <input type="text" style="width:400px;height:300px" name="content" value="<?php echo $row[3]?>"><br/>
        <input type="hidden" name="_id" value="<?php echo $row[0] ?>">

        <input type="submit" value="수정하기">

    </form>

    </body>
</html>
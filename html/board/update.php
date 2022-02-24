<?php

    # db 연결
    include "../db.php";

    # POST 방식으로 값 받아오기
    $_id = $_POST["_id"];
    $title = $_POST["title"];
    $name = $_POST["name"];
    $content = $_POST["content"];

    # 받아온 값으로 UPDATE 쿼리 작성
    $sql  = "
    UPDATE
        board
    SET
        title = '".$title."',
        name = '".$name."',
        content = '".$content."'
    WHERE
        _id = ".$_id."
    ;
    ";

    # 쿼리 수행
    $result = $conn->query($sql);

    # db 연결 종료
    $conn->close();

?>

<script>

    location.href="view.php?_id=<?php echo $_id ?>";

</script>
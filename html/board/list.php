<?php

    # db 연결
    include "../db.php";

    # select 쿼리 작성
    $sql = "SELECT _id, name, title, view_count FROM board order by _id desc";

    # mysql에 쿼리 수행
    $result = $conn->query($sql);

    # mysql 연결 종료
    $conn->close();

?>

<html>
    <head>
        <title>나만의 게시판</title>
    </head>
    <body>
        
        <table style="border:1px solid #000; width:100%">
            <tr>
                <td>번호</td>
                <td>제목</td>
                <td>작가</td>
                <td>열람수</td>
            </tr>

        <?php 
        
            while($row = $result->fetch_assoc()) { 
        ?>
        <tr>
            <td><?php echo $row["_id"]?></td>
            <td>
                <a href="view.php?_id=<?php echo $row["_id"]?>"><?php echo $row["title"]?></a>
                <a href="delete.php?_id=<?php echo $row["_id"]?>">삭제</a>
            </td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["view_count"]?></td>
        </tr>
        <?php 
        }
        ?>

        </table>

    </body>

    <a href="input.php">글쓰기</a>
</html> 


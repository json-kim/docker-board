<?php

    # db 연결
    include "../db.php";

    if($_SESSION["board_name"] == '')
        $_SESSION["board_name"] = "자유";

    // 전체 게시물의 수를 가져오는 쿼리
    $total_sql = "
    SELECT
        count(*) as total
    FROM
        board
    ;
    ";
    $total_result = $conn->query($total_sql);
    $total_row = $total_result->fetch_row();

    $config_list_set_count = 10;    // 페이지당 표시할 게시물의 수
    $config_list_max_count = 5;     // 하단에 표시할 페이지의 수 
    $now_page = $_GET["now_page"];  // 현재 위치한 페이지
    if ($now_page == NULL) {
        $now_page = 1;
    }

    $total_count = $total_row[0];   // 전체 게시물의 수

    # select 쿼리 작성
    $sql = "
    SELECT 
        _id, 
        name, 
        title, 
        view_count 
    FROM 
        board
    WHERE
        board_name = '".$_SESSION["board_name"]."'
    order by _id desc
    LIMIT ".$config_list_set_count * ($now_page-1).",".$config_list_set_count."
    ;
    ";

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

        게시판 바로가기 : 
        <a href='board_change.php?board_name=자유'>자유게시판</a>
        <a href='board_change.php?board_name=장터'>장터게시판</a>
        <a href='board_change.php?board_name=임시'>임시게시판</a>
        <hr>
        
        <table style="border:1px solid #000; width:100%">
            <tr>
                <td>번호</td>
                <td>제목</td>
                <td>작성자</td>
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
        <?php
            // echo $_GET["now_page"]."</br>";

            // 전체 페이지의 개수
            $total_page = ceil($total_count / 10);

            // echo "전체 페이지: ".$total_page;

            // 시작 페이지 계산
            $start = $now_page - $config_list_max_count;
            // 최소값 보장
            if ($start <= 0) {
                $start = 1;
            }

            // 끝 페이지 계산
            $end = $now_page + $config_list_max_count;
            // 최대값 보장
            if ($end >= $total_page) {
                $end = $total_page;
            }

            // echo $start."<br/>";
            // echo $end."<br/>";

            // 페이징 만들기
            for ($i = $start; $i <= $end; $i++) {
                //현재 페이지는 굵은색 처리
                if ($i == $now_page) {
                    echo "[<b>";
                }

                // GET 방식으로 now_page를 현재 페이지값($i)으로 해서 요청
                echo "<a href='list.php?now_page=".$i."'>".$i."</a>"." ";

                //현재 페이지는 굵은색 처리
                if ($i == $now_page) {
                    echo "</b>]";
                }
            }
        ?>

    <br/>
    <a href="input.php">글쓰기</a>
    </body>

</html> 


<?php

    session_start();

    if ($_SESSION["name"] == '') { // 세션의 name 변수가 비어 있으면 로그인 페이지로 이동
        echo "로그인이 필요합니다. <a href='login.php'>로그인 하러가기</a>";
        exit();
    }

?>

<html>
    <head>
        <title>나만의 게시판</title>
    </head>
    <body>

    <form action="insert.php" method="post">
        게시판이름 :
        <select name="board_name">
            <option value="자유">자유게시판</option>
            <option value="장터">장터게시판</option>
            <option value="임시">임시게시판</option>
        </select>

        작성자 : <input type="text" name="name" value=<?php echo $_SESSION["name"] ?>><br/>
        제목 : <input type="text" name="title"><br/>
        내용 : <input type="text" style="width:400px;height:300px" name="content"><br/>

        <input type="submit" value="등록하기">

    </form>

    </body>
</html>
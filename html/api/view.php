<?php
    include "../db.php";

    $id = $_GET["_id"]; 

    $update_sql = "
        UPDATE
            board
        SET
            view_count = view_count +1
        WHERE _id   = ".$id;
    
    $conn->query($update_sql); 

    $sql = "SELECT _id,name,title,content FROM board WHERE _id = ".$id;
     
    $result = $conn->query($sql);

    $row = $result->fetch_row();
      
    $conn->close();

    echo json_encode($row,JSON_UNESCAPED_UNICODE);
?>
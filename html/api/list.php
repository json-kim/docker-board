<?php 
    include "../db.php";


    $sql = "SELECT _id,name,title,view_count FROM board order by _id desc";
    $result = $conn->query($sql);     
    $conn->close();
    
    while($row = $result->fetch_assoc()) { 
        echo json_encode($row,JSON_UNESCAPED_UNICODE);
    }


?>
<?php

    # db 연결
    include "../db.php";

    $_id = $_GET["_id"];
    
    $query = "
    DELETE FROM
        board
    WHERE
        _id = ".$_id."
    ;
    ";

    $conn->query($query);

    $conn->close();

?>

<script>

    location.href="list.php";

</script>
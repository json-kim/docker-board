<?php

    session_start();

    $board_name = $_GET["board_name"];

    $_SESSION['board_name'] = $board_name;

?>

<script>
    location.href="list.php";
</script>
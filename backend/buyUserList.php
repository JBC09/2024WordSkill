<?php

    include './dbconn.php';

    
    session_start();
    $userId = $_SESSION["userId"];
    $sql = "SELECT * FROM goods a INNER JOIN buyList b on a.pk = b.goodsPk WHERE b.userId = '$userId' ORDER BY b.pk DESC";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    whiles($result);
 

?>
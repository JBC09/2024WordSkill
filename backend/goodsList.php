<?php

    include './dbconn.php';



    $sql = "SELECT * FROM goods ORDER BY title ASC";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    whiles($result);
 

?>
<?php

    include './dbconn.php';



    $sql = "SELECT *, COALESCE(sum(b.person),0) as count, b.pk as bpk, a.pk as pk FROM course a LEFT JOIN reservation b on a.pk = b.fk  GROUP BY a.pk ORDER BY a.date DESC ";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    whiles($result);
 

?>
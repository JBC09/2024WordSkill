<?php
    include './dbconn.php';

    $start = $_POST["start"];
    $end = $_POST["end"];

    $sql = "SELECT * FROM festivals WHERE 
    (startdate <= '$start' AND enddate >= '$start') OR
    (startdate <= '$end' AND enddate >= '$end') OR
    (startdate >= '$start' AND '$end' >= enddate)";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    whiles($result);
 
?>
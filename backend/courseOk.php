<?php

    include './dbconn.php';

    session_start();
    $userId = $_SESSION["userId"];
    $pk = $_POST["pk"];
    $start = $_POST["start"];
    $end = $_POST["end"];


 
    $sql = "SELECT * FROM course WHERE gabber = '$userId' AND  date BETWEEN '$start' AND '$end'";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0) {
        $sql = "UPDATE course SET gabber = '$userId' WHERE pk = $pk";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();

        echo json_encode(["state" => "ok"]);
    }
    else {
        echo json_encode(["state" => "no"]);
    }

?>
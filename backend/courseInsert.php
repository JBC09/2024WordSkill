<?php

    include './dbconn.php';

    $courseName = $_POST["courseName"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $person = $_POST["person"];


    $preDate = date("Y-m-d H:i:s" ,strtotime("-2 hours", strtotime($date)));
    $nextDate = date("Y-m-d H:i:s" ,strtotime("+2 hours", strtotime($date)));

    $sql = "SELECT * FROM course WHERE date BETWEEN '$preDate' AND '$nextDate'";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0) {
        $sql = "INSERT INTO course VALUES(NULL, '$courseName', 
        '$date',$time,$person,'', 0)";

        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        echo json_encode(["state" => "ok"]);
    }
    else {
        echo json_encode(["state" => "no"]);
    }

?>
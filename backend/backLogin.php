<?php

    include './dbconn.php';

    $userId = $_POST["userId"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE userId = '$userId' AND password = '$password'";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0) {
        echo json_encode(["state"=> "no"]);
    }
    else {
        session_start();

        $row = $result->fetch_assoc();


        $_SESSION["userId"] = $userId;
        $_SESSION["userName"] = $row["userName"];
        $_SESSION["grade"] =  $row["grade"];


        echo json_encode(["state" => "ok"]);
    }


?>
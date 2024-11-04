<?php
    
    include './dbconn.php';

    $userId = $_POST["userId"];
    $userName = $_POST["userName"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM user WHERE userId ='$userId'";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0) {

        $sql = "INSERT INTO user VALUES('$userId', '$userName', '$password', 0)";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        echo json_encode(["state" => "ok"]);
    }
    else {
        echo json_encode(["state" => "no"]);
    }
?>
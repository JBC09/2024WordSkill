<?php

    include './dbconn.php';

    session_start();

    $userId = $_SESSION["userId"];
    $count = $_POST["count"];
    $price = $_POST["price"];
    $goodsPk = $_POST["goodsPk"];
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO buylist VALUES(
    NULL, '$userId', $count, $price, $goodsPk, '$date')";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

    

?>
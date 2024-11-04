<?php


session_start();
    include './dbconn.php';


    $fk = $_POST["fk"];
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $person = $_POST["person"];
    $userId = $_SESSION["userId"];

    $sql = "INSERT INTO reservation VALUES(NULL, '$userId', '$name', 
    '$tel', '$email', $person, $fk)";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

?>
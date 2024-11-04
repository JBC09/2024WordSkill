<?php

    include './dbconn.php';

    session_start();
    $pk = $_POST["pk"];
 

    $sql = "UPDATE course SET gabber = '' WHERE pk = $pk";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

  
?>
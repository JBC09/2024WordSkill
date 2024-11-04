<?php

    include './dbconn.php';

    $title = $_POST["title"];
    $startdate = $_POST["startdate"];
    $enddate = $_POST["enddate"];
    $place = $_POST["place"];
    $type = $_POST["type"];
  

    $date = date("YmdHis");

    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];

    $fileName = $date.$fileName;

    move_uploaded_file($fileTmpName, "../festivals/".$fileName);

    $sql = "INSERT INTO festivals VALUES(NULL, '$fileName', '$title', 
    '$startdate', '$enddate', '$place', '$type')";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
?>

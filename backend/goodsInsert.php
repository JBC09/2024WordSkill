<?php

    include './dbconn.php';

    $title = $_POST["title"];
    $price = $_POST["price"];
    $content = $_POST["content"];

    $date = date("YmdHis");

    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];

    $fileName = $date.$fileName;

    move_uploaded_file($fileTmpName, "../goods/".$fileName);

    $sql = "INSERT INTO goods VALUES(NULL, '$fileName', '$title', 
    $price, '$content')";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
?>
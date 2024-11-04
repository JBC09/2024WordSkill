<?php
    include './dbconn.php';


    $data = json_decode(file_get_contents("../JSON/festivals.json"));


    $sql = "INSERT INTO festivals VALUES(NULL,?, ?, ? ,? , ? ,? )";
    foreach ($data as $key => $value) {
        $stmt= $mysqli->prepare($sql);
            $stmt->bind_param("ssssss",
            $value->photo,
            $value->title,
            $value->startdate,
            $value->enddate,
            $value->place,
            $value->type
        );


        $stmt->execute();
    }

    echo "정상적으로 마이그레이션 되었습니다.";
?>
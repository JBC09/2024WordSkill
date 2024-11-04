<?php

    $mysqli = new mysqli("localhost", "domachan" ,"cksqls3887!", "domachan");

    function whiles($data) {
        $array = array();

        while($row = $data->fetch_assoc()){
            array_push($array, $row);
        }


        echo json_encode($array);
    }
?>
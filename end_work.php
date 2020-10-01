<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $ref = $_GET['ref'];
    $sql = "INSERT INTO tb_after (ref_id) VALUES ($ref)";
    $response = array();
    if(mysqli_query($mysqli, $sql)){
        $response['success'] = true;
        $response['message'] = $mysqli->insert_id;
    }else{
        $response['success'] = false;
        $response['message'] = "Failed to End a JOB! Try again".$sql;
    }
    echo json_encode($response);
?>
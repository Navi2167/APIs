<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $response = array();
    if(isset($data)!==null&&!empty($data)){
        $sql = "INSERT INTO tb_before(ad_id, job_title, job_desc) VALUES ($data->ad_id,'$data->title','$data->desc')";
        if(mysqli_query($mysqli, $sql)){
            $response['success'] = true;
            $response['message'] = $mysqli->insert_id;
        }else{
            $response['success'] = false;
            $response['message'] = "Failed to create a JOB! Try again".$sql;
        }
    }else{
            $response['success'] = false;
            $response['message'] = "Failed! Empty file";
        }
    echo json_encode($response);
?>
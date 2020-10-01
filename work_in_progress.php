<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $response = array();
    if(isset($data)!==null&&!empty($data)){
        $sql = " INSERT INTO tb_work_progress (work_id, user_id, size, work_status) 
        VALUES ($data->work_id,$data->user_id,$data->size,1)";
        if(mysqli_query($mysqli, $sql)){
            $response["success"] = true;
            $response["message"] = $mysqli->insert_id;
        }
    }else{
        $response["success"] = false;
        $response["message"] = "Didn't insert";
    }
    echo json_encode($response);
?>
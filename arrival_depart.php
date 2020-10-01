<?php
    date_default_timezone_set('Australia/Brisbane');
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $response = array();
    $d = date("Y-m-d H:i:s");
    if(isset($data)!==null&&!empty($data)){
        if($data->work_status=='Sign In'){
            $sql = "INSERT INTO tb_arrival(arrival, departure, u_id, longitude, latitude, work_status) VALUES ('$d','$d', $data->u_id, $data->longitude, $data->latitude, 'pending')";
        }else{
            $sql = "UPDATE tb_arrival SET departure='$d', work_status='finished' WHERE id=$data->id";
        }
        if(mysqli_query($mysqli, $sql)){
            if($data->work_status=='Sign In'){
                $response['success'] = true;
                $response['message'] = $mysqli->insert_id;
            }else{
                $response['success'] = true;
                $response['message'] = "0";
            }
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
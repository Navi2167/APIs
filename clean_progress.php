<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
   $id = $_GET['id'];
    $response = array();
        $sql = "DELETE FROM tb_work_progress WHERE id=$id";
        if(mysqli_query($mysqli, $sql)){
            $response['success'] = true;
            $response['message'] = "Done";
        }else{
            $response['success'] = false;
            $response['message'] = "Failed to delete! Try again";
        }
    echo json_encode($response);
?>
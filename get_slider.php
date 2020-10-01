<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $sql = "SELECT * FROM tb_slider";
    $response = array();
     $res = mysqli_query($mysqli, $sql);
    if($res){
        $row = mysqli_fetch_row($res);
        $response["success"] = true;
        $response["message"] = $row[1];
    }else{
        $response["success"] = false;
        $response["message"] = "Error";
    }
   
    
    
    echo json_encode($response);;
?>
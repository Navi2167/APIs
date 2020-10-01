<?php
     include_once "connection.php";
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $status=0;
    $response = array();
    if(isset($data)!==null&&!empty($data)){
         $password=password_hash($data->password, PASSWORD_BCRYPT, array("cost" => 10));
        $sql = "SELECT * FROM users WHERE email = '$data->email' or or contact='$data->contact'";
        $date = date("Y-m-d");
        $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0) {
            $response['success'] = false;
            $response['message'] = 'You are already registered! Please login';
        } else {
        $sql = "INSERT INTO tb_register (name, email, address, password, contact, submit_date, status) VALUES ('$data->name','$data->email','$data->address','$password','$data->contact','$date',$status)";
            if(mysqli_query($mysqli, $sql)){
                $response['success'] = true;
                $response['message'] = 'Registered successfully';
            }else{
                $response['success'] = false;
                $response['message'] = 'Registered failed'.$sql;
            }
            
        }
        $mysqli->close();
    }else{
        $response['success'] = false;
        $response['message'] = 'Empty File';
    }
    echo json_encode($response);
?>
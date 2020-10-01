<?php
      include_once "connection.php";
      $id = $_GET["id"];
      $msg = $_GET["msg"];
      $response = array();
      if(isset($id)!=null&&!empty($id)){
          $sql = "INSERT INTO tb_message (admin_id, user_id, message) VALUES (0,$id,'$msg')";
          if(mysqli_query($mysqli, $sql)){
                $response['success'] = true;
                $response['message'] = "Message sent Successfully";
            }else{
                $response['success'] = false;
                $response['message'] = "Message didn't send";
            }
      }else{
            $response['success'] = false;
            $response['message'] = "No id";
      }
      echo json_encode($response);
?>
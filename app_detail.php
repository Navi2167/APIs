 <?php
     include_once "connection.php";
	    $sql = "SELECT * FROM tb_app_update";
	    $res = mysqli_query($mysqli, $sql);
	    $response = array();
	    if($res){
	       $row = mysqli_fetch_assoc($res);
            $response['success'] = true;
            $response['message'] = $row['app_version'];
        }else{
            $response['success'] = false;
            $response['message'] = "Failed!";
        }
    echo json_encode($response);
?>
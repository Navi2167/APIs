 <?php
     include_once "connection.php";
    $id = $_POST["id"];
    $index = $_POST["index"];
    $table = $_POST["table"];
    $filename= $_FILES["pic"]["name"];
    $type  = pathinfo($filename, PATHINFO_EXTENSION);
    $file = date('YmdHis').'_'.rand(99,9999).'.'.$type;
	$target_file_name ='/home1/wellcar1/public_html/trimcleaning.com.au/TrimDomestic/jobimage/'.$file; 
	$pic = 'jobimage/'.$file; 
	$response = array();
	$col = $table[3].'pic'.$index;
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file_name)) {  
	    $sql = "UPDATE $table SET $col='$pic' WHERE id=$id";
	    if(mysqli_query($mysqli, $sql)){
            $response['success'] = true;
            $response['message'] = "done";
        }else{
            $response['success'] = false;
            $response['message'] = "Failed!";
        }
	        
    }else{
        $response['success'] = false;
        $response['message'] = "Failed! to move";
    }
    echo json_encode($response);
?>
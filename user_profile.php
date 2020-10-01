 <?php
     include_once "connection.php";
    $id = $_POST["id"];
    $filename= $_FILES["profile"]["name"];
    $type  = pathinfo($filename, PATHINFO_EXTENSION);
    $file = date('YmdHis').'_'.rand(99,9999).'.'.$type;
	$target_file_name ='/home1/wellcar1/public_html/trimcleaning.com.au/TrimDomestic/profileimage/'.$file; 
	$pic = 'profileimage/'.$file; 
	$response = array();
    	if(move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file_name)) {  
    	 $sql = "UPDATE tb_register SET pic='$pic' WHERE id=$id";
    	    if(mysqli_query($mysqli, $sql)){
                $response['success'] = true;
                $response['message'] = "$pic";
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
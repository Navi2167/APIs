<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $category = array();
    if(isset($data)!==null&&!empty($data)){
        if(isset($data->password)!==null && !empty($data->password)){
            if(password_verify($data->pic,$data->submit_date)){
                $password=password_hash($data->password, PASSWORD_BCRYPT, array("cost" => 10));
                $sql = " UPDATE tb_register SET name='$data->name', email='$data->email', address='$data->address', password='$password',contact='$data->contact' WHERE id=$data->id";
                if(mysqli_query($mysqli, $sql)){
                    $res = mysqli_query($mysqli,"SELECT * FROM tb_register WHERE id=$data->id ");
                     if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_assoc($res)){
                            array_push($category,$row);
    	                }
                		$json=json_encode($category,true); 
                		$category1=array($json); 
                		$json2 = implode(",",$category1);
                	    echo '{"return":'.$json2.'}';
    
                     }
                }
            }
        }else{
            $sql = " UPDATE tb_register SET name='$data->name', email='$data->email', address='$data->address',contact='$data->contact' WHERE id=$data->id";
            if(mysqli_query($mysqli, $sql)){
                $res = mysqli_query($mysqli,"SELECT * FROM tb_register WHERE id=$data->id ");
                if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        array_push($category,$row);
    	            }
                    $json=json_encode($category,true); 
                    $category1=array($json); 
                    $json2 = implode(",",$category1);
                   echo '{"return":'.$json2.'}';
                }
            }
        }
    }else{
       echo '{"return":"0"}';
    }
?>
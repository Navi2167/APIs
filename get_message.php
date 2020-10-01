<?php
header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_message WHERE user_id=$id ORDER BY id DESC";
    $res = mysqli_query($mysqli, $sql);
    $category = array();
    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            array_push($category,$row);
	    }
		$json=json_encode($category,true); 
		$category1=array($json); 
		$json2 = implode(",",$category1);
		echo '{"return":'.$json2.'}';
    }else{
        echo '{"return":"0"}';
    }
?>
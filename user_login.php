<?php
    header("Content-type: application/json; charset=utf-8");
    include_once "connection.php";
    $category = array();
    $a ="";
	    $username=$_GET["username"];
	    $password=$_GET["password"];
	    $a = mysqli_query($mysqli,"SELECT * FROM tb_register WHERE contact='$username' or email='$username' ");
        if(mysqli_num_rows($a)>0){ 
        $dbpassword="";
        if($result = mysqli_fetch_assoc($a)){
            $dbpassword=$result["password"];
            array_push($category,$result); 
        }
   
        if(password_verify($password, $dbpassword)) {
            $json=json_encode($category,true); 
            $users1=array($json); 
            $json2 = implode(",",$users1);
            echo '{"return":'.$json2.'}';
        }
        else {
        	echo '{"return":"0"}';
        }
    }else{
        echo '{"return":"1"}';
    }
?>
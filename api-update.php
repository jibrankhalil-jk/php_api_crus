<?php 

// header('Content-Type : application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Request-Method: PUT');
header('Access-Control-Request-Header:
 Access-Control-Request-Method,
 Content-Type,Authorization');

include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$sid = $data["sid"];
$name = $data["Name"];
$fname = $data["Fname"];
$sclass = $data["class"];

$sql = "UPDATE `students` SET `Name` = '{$name}',`Fname`='{$fname}', `class` = '{$sclass}' WHERE students.sid = {$sid}";



    if(mysqli_query($conn, $sql)){
    
        echo json_encode(array('message'=> 'student Record updated', 'status'=> true)); 
    
    }else{
        echo json_encode(array('message'=> 'Failed to update', 'status'=> false)); 
    
    }




?>
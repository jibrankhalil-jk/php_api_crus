<?php 

// header('Content-Type : application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Request-Method: POST');
header('Access-Control-Request-Header:
 Access-Control-Request-Method,
 Content-Type,Authorization');

include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$name = $data["Name"];
$fname = $data["Fname"];
$sclass = $data["class"];


$sql = "INSERT INTO `students` ( `Name`, `Fname`, `class`) VALUES ('{$name}','{$fname}','{$sclass}')";
try{
    if(mysqli_query($conn, $sql)){
    
        echo json_encode(array('message'=> 'student Record inserted', 'status'=> true)); 
    
    }else{
        echo json_encode(array('message'=> 'No Record Found', 'status'=> false)); 
    
    }

} catch(e){
echo e;
}



?>
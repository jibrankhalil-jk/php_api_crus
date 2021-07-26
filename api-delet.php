<?php 

header('Acess-Control-Allow-Origin: *');

include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data["sid"];


$sql = "DELETE FROM `students` WHERE `students`.`sid` = {$student_id}";
if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=> ' Record  Deleted Sucessfuly', 'status'=> true)); 

}else{
    echo json_encode(array('message'=> ' Record Not Deleted', 'status'=> false)); 

}


?>
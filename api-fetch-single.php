<?php 

header('Acess-Control-Allow-Origin: *');
// header('Content-Type : application/json');
header('Access-Control-Request-Header:
 Access-Control-Request-Method,
 Content-Type,Authorization');
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data["sid"];

if($student_id == "") {
echo "No data recieved";

}else{


$sql = "SELECT * FROM students WHERE sid = {$student_id}";
$results = mysqli_query($conn, $sql) or die("SQL query failed");

if(mysqli_num_rows($results) > 0 ){
$output = mysqli_fetch_all($results, MYSQLI_ASSOC);
echo json_encode($output); 
}else{
    echo json_encode(array('message'=> 'No Record Found', 'status'=> false)); 

}
}

?>
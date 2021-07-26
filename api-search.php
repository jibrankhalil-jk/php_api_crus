<?php 
  
header('Acess-Control-Allow-Origin: *');

include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$search_value = $data["search"];
$sql = "SELECT *  FROM `students` WHERE Name LIKE '%{$search_value}'";
$results = mysqli_query($conn, $sql) or die("SQL query failed");

if(mysqli_num_rows($results) > 0 ){
    $output = mysqli_fetch_all($results, MYSQLI_ASSOC);
    echo json_encode($output); 
    }else{
        echo json_encode(array('message'=> 'No Rec  ord Found', 'status'=> false)); 
    
    }
    

?>
<?php 
$filePath = '../../../../tasks.json';
//read tasks json file
$tasksJsonString = file_get_contents($filePath);
// send a FormData() object through axios 
header('Content-Type: application/json');

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

//print array
echo $tasksJsonString;
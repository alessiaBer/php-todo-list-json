<?php 
//read tasks json file
$tasksJsonString = file_get_contents('tasks.json');
// send a FormData() object through axios 
header('Content-Type: application/json');
//print array
echo $tasksJsonString;

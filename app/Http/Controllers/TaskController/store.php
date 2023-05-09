<?php

$filePath = '../../../../tasks.json';

if (isset($_POST["newTask"])) {
    //define the new task structure
    $task = [
        "name" => $_POST["newTask"],
        "done" => false
    ];
    //read json file
    $tasksString = file_get_contents($filePath);
    //convert into an associative array
    $tasksArray = json_decode($tasksString, true);
    //add task to the array
    array_unshift($tasksArray, $task);
    //transform back the string into a json
    $newTasksJSONString = json_encode($tasksArray);
    //replace the file content
    file_put_contents($filePath, $newTasksJSONString);
    // send a FormData() object through axios
    header('Content-Type: application/json');

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");

    //print the result json array
    echo $newTasksJSONString;
}

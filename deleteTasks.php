<?php


if(isset($_POST["index"])) {
    //assign the function param value to a variable 
    $index = intval($_POST["index"]);
    //read tasks json file
    $tasksString = file_get_contents('tasks.json');
    //convert into an associative array
    $tasksArray = json_decode($tasksString, true);
    // remove the item at the $index position
    array_splice($tasksArray, $index, 1);
    //transform back the string into a json
    $newTasksJSONString = json_encode($tasksArray);
    //replace the file content
    file_put_contents('tasks.json', $newTasksJSONString);
    // send a FormData() object through axios 
    header('Content-Type: application/json');
    //print the result json array
    echo $newTasksJSONString;
}

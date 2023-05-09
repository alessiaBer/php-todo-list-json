<?php 
if(isset($_POST["index"])) {
    //assign to a variable the function param
    $index = intval($_POST["index"]);
    //read json file
    $tasksString = file_get_contents('tasks.json');
    //convert into an associative array
    $tasksArray = json_decode($tasksString, true);
    // save in a variable the index of value of tasksArray
    /* $numericIndexedArray = array_values($tasksArray);
    //assign to a variable the position that have to change
    $task = $numericIndexedArray[$index];

    $task["done"] = !$task["done"]; */
    $tasksArray[$index]["done"] = !$tasksArray[$index]["done"];


    //transform back the string into a json
    $newTasksJSONString = json_encode($tasksArray);
    //replace the file content
    file_put_contents('tasks.json', $newTasksJSONString);
    // send a FormData() object through axios
    header('Content-Type: application/json');
    //print the result json array
    echo $newTasksJSONString;
}
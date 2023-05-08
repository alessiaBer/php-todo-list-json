<?php 

if(isset($_POST["index"])) {
    //assign to a variable the function param
    $index = intval($_POST["index"]);
    //read json file
    $tasksString = file_get_contents('tasks.json');
    //convert into an associative array
    $tasksArray = json_decode($tasksString, true);
    // save in a variable the index of value of tasksArray
    $numericIndexedArray = array_values($tasksArray);
    //assign to a variable the position that have to change
    $task = $numericIndexedArray[$index];
    // through an if statement verify the value of done of the task and change it when is clicked
    if($task["done"] === true) {
        $task["done"] = false;
    } else {
        $task["done"] = true;
    }
    //assign to a var the task that has to replace the old task
    $replacement = array($index => $task);
    //replace values
    $newTasksArray = array_replace($tasksArray, $replacement);
     //transform back the string into a json
    $newTasksJSONString = json_encode($newTasksArray);
    //replace the file content
    file_put_contents('tasks.json', $newTasksJSONString);
    // send a FormData() object through axios 
    header('Content-Type: application/json');
    //print the result json array
    echo $newTasksJSONString;
}
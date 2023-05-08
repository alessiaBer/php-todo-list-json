<?php 

if(isset($_POST["index"])) {
    $index = intval($_POST["index"]);
    //read json file
    $tasksString = file_get_contents('tasks.json');
    //convert into an associative array
    $tasksArray = json_decode($tasksString, true);

    $numericIndexedArray = array_values($tasksArray);

    $task = $numericIndexedArray[$index];

    if($task["done"] === true) {
        $task["done"] = false;
    } else {
        $task["done"] = true;
    }

    $replacement = array($index => $task);
    $newTasksArray = array_replace($tasksArray, $replacement);

    //transform back the string into a json
    $newTasksJSONString = json_encode($newTasksArray);
    //replace the file content
    file_put_contents('tasks.json', $newTasksJSONString);

    header('Content-Type: application/json');

    echo $newTasksJSONString;
}
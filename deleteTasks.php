<?php


if(isset($_POST["index"])) {

    $index = intval($_POST["index"]);

    $tasksString = file_get_contents('tasks.json');

    //read json file
    $tasksString = file_get_contents('tasks.json');
    //convert into an associative array
    $tasksArray = json_decode($tasksString, true);

    array_splice($tasksArray, $index, 1);

    //transform back the string into a json
    $newTasksJSONString = json_encode($tasksArray);
    //replace the file content
    file_put_contents('tasks.json', $newTasksJSONString);

    header('Content-Type: application/json');

    echo $newTasksJSONString;
}

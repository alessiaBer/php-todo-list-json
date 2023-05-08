<?php 

if (isset($_POST["newTask"])) {
    $task = $_POST["newTask"];

    //read json file
    $tasksString = file_get_contents('tasks.json');

    $tasksArray = json_decode($tasksString, true);

    array_unshift($tasksArray, $task); 

    $newTasksJSONString = json_encode($tasksArray);

    file_put_contents('tasks.json', $newTasksJSONString);

    header('Content-Type: application/json');

    echo $newTasksJSONString; 
}


?>
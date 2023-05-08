<?php 
//read tasks json file
$tasksJsonString = file_get_contents('tasks.json');
//print array
echo $tasksJsonString;

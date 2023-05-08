<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ToDo List JSON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .container {
            width: 50%;
        }
    </style>
</head>

<body>

    <div id="app">
        <div class="container">
            <h1 class="mt-4">ToDo List</h1>
            <div class="card my-4">
                <ul class="list-unstyled mb-0">
                    <li v-for="task in tasks" class="p-3">
                        {{task}}
                    </li>
                </ul>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" @click="addTask()">
                    +
                </span>
                <input type="text" class="form-control" placeholder="Add new task" v-model="newTask"
                    @keyup.enter="addTask()">
            </div>
        </div>
    </div>



    <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <script src="./app.js"></script>
</body>

</html>
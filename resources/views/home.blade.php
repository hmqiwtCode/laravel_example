<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon.ico">
    <title>YOUR API</title>
    <style>
        body {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center" style="padding: 20px">#YOUR TASK</h1>
        <div class="row">
            <div class="col-md-6 shadow-sm bg-white rounded" style="background: white;width: 500px">
                <button type="button" class="btn btn-outline-dark" style="margin-top: 15px">INFO</button>
                <hr>
                <div class="row justify-content-center align-items-center">
                    <form class="col-md-6">
                        <div class="form-group">
                            <label for="taskname">Name:</label>
                            <input type="text" class="form-control" value="{{$user['name']}}" placeholder="your name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="taskname">Email:</label>
                            <input type="text" class="form-control" value="{{$user['email']}}" placeholder="your email" readonly>
                        </div>

                        <div class="form-group">
                            <label for="taskname">API_KEY:</label>
                            <input type="text" class="form-control" value="{{$user['api_key']}}" placeholder="your key" readonly>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-0">

            </div>
            <div class="col-md-6 shadow-sm bg-white rounded" style="background: white;width: 500px">
                <button type="button" class="btn btn-outline-dark" onclick="check()" style="margin-top: 15px"></i>Current Task</button>
                <hr>
                <div class="row">
                @foreach($tasks as $task)
                    <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-body">

                                    <input type="hidden" class="form-control mb-2" value="{{$task['id']}}" placeholder="your task" >
                                    Name:<input type="text" class="form-control mb-2" value="{{$task['name']}}" placeholder="your task" >
                                    Times<input type="text" class="form-control mb-2" value="{{$task['times']}}" placeholder="your times" >
                                    <button class="btn btn-danger" onclick="update(this,event)">Update</button>
                                </div>
                            </div>
                    </div>
                @endforeach
                </div>
                <!--  -->
                </div>
            </div>
        </div>
        <br>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../resources/js/home.js"></script>

</body>

</html>
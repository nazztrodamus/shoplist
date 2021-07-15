<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- SCRIPT -->
    <script src=" {{ asset('js/app.js') }} " defer ></script>
    <!-- FONTS -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?fsmily=Nunito" rel="stylesheet">
    <!-- STYLES -->
    <link href=" {{asset('css/app.css')}} " rel="stylesheet";>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>EDIT ITEM {{$todo->title}} </title>
</head>
<body class="d-flex w-100 d-flex justify-content-center align-items-center h-100">
    <div>  
        <div>
            <h1 class="display-2">EDIT ITEM: {{$todo->title}}</h1>
        </div>
        <form action="{{ route('todo.update', $todo->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="input-group mb-3 w-100" >
                <input type="text" class="form-control form-control-lg" 
                name="title" value=" {{$todo->title}} " aria-label="Recipient's username" 
                aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">
                        SAVE
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
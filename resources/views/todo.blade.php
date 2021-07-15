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
    <title>SHOPPING LIST</title>
</head>
<body class="d-flex w-100 d-flex justify-content-center align-items-center h-100">
    <div>  
        <div>
            <h1 class="display-2">SHOPPING LIST</h1>
        </div>
        <h2 class="pt-4" >What do you want to add next?</h2>
        <form action="{{ route('todo.store') }}" method="POST" >
            @csrf
            <div class="input-group mb-3 w-100" >
                <input type="text" class="form-control form-control-lg" 
                name="title" placeholder="Type here..." aria-label="Recipient's username" 
                aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="border-0 bg-transparent ml-2" type="submit" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <h2  class="pt-2">My List:</h2>
        <div class="bg-light text-dark">
            @forelse ($todos as $todo)
                <div  class="w-100 d-flex align-items-center justify-content-between">
                    <div class="pt-4 input-group" >@if ($todo->completed == 0)
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="4" y="4" width="16" height="16" rx="2" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <polyline points="9 11 12 14 20 6" />
                            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                        </svg>
                    @endif
                        {{$todo->title}}
                    </div>
                    <div class="mr-4 mt-1 mb-1 pt-4 d-flex">
                        @if ($todo->completed == 0)
                            <form action="{{route('todo.update', $todo->id)}}" method="POST" >
                                @method('PUT')
                                @csrf
                                <input type="text" value="1" name="completed" hidden>
                                <button class="border-0 bg-transparent ml-2" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                </button>
                            </form>
                        @else
                        <form action="{{route('todo.update', $todo->id)}}" method="POST" >
                            @method('PUT')
                            @csrf
                            <input type="text" value="0" name="completed" hidden>
                            <button class="border-0 bg-transparent ml-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                        </form>
                        @endif
                        <a class="inlane-block" href=" {{route('todo.edit', $todo->id )}} " >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit ml-4" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                        </a>
                        
                        <form action=" {{route('todo.destroy', $todo->id)}} " method="POST" >
                            @csrf
                            @method('DELETE')
                            <button class="border-0 bg-transparent ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    
                </div>
                @empty
            @endforelse
        </div>

    </div>
</body>
</html>
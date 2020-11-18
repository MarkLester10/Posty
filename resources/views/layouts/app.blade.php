<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
    <link rel="icon" type="image/png" href="{{ asset('imgs/posty.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body{
            font-family: "Poppins", sans-serif
        }
    </style>
</head>
<body class="bg-gray-200">
    <div class="flex flex-col h-screen justify-between">
    <header class="bg-white w-full">
        <div class="flex items-center mx-auto justify-between w-11/12">
          <div class="p-2">
           <a href="/"><img class="w-12" src="{{ asset('imgs/posty.png') }}" alt="Posty"></a>
          </div>
          <div>
            <ul class="flex items-center sm:text-sm">
                <li>
                    <a href="{{ route('posts') }}" class="p-2">Post</a>
                </li>
                @auth
                <li>
                    <a href="{{ route('user.posts', auth()->user()) }}" class="p-2">{{ auth()->user()->name}}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="p-2 focus:outline-none">Logout</button>
                    </form>

                </li>
                @endauth
                @guest
                <li>
                    <a href="{{ route('login') }}" class="p-2">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-2">Register</a>
                </li>
                @endguest
            </ul>
          </div>
        </div>
      </header>
        <main class="mb-auto">
            @yield('content')
        </main>
        <footer class="h-10 bg-gray-800 py-2">
            <div class="text-center text-gray-500">
                Posty &copy; {{ date('Y') }}
                <a href="#"><span><i class="fab fa-github"></i></span></a>
            </div>
        </footer>
      </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href={{asset('images/suitcase.ico')}}>
  <title>{{config('app.name')}} | @yield('page_title')</title>
  <script src="https://kit.fontawesome.com/4ee982e396.js" crossorigin="anonymous"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
          <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#e8834d",
                        },
                    },
                },
            };
          </script>
</head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24 m-4" src={{asset("images/logoNoBg.png")}} alt=""
            /></a>
              
            <ul class="flex space-x-6 mr-6 text-lg">    
                @auth
                    <li>
                        <span class="font-bold uppercase">
                            Welcome {{auth()->user()->name}}
                        </span>
                    </li>
                    <li>
                        <a href="/listings/manage" class="hover:text-laravel">
                            <i class="fa-solid fa-user-plus"></i>
                            Manage Listings
                        </a>
                    </li>
                    <li>
                        <a href="/listings" class="hover:text-laravel">
                            <i class="fa-solid fa-list"></i>
                            All Listings
                        </a>
                    </li>
                    <li>
                      <form action="/logout" class="inline" method="post">
                        @csrf
                        <button type="submit" class="hover:text-laravel">
                            <i class="fa-solid fa-sign-out"></i>
                            Logout
                        </button>
                      </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-laravel">
                            <i class="fa-solid fa-user-plus"></i>  Register
                        </a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel">
                            <i class="fa-solid fa-right-to-bracket"></i>  Login
                        </a>
                    </li>
                @endauth    
            </ul>  
        </nav>
        <x-flash::message/>
        <main>
            {{-- This Component is used to bind views --}}
            {{$slot}}
        </main>
        
        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="/listings/create"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Job</a
            >
        </footer>
    </body>
</html>
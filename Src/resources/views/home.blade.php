<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="theme-color" content="#4258f4"/>{{-- This Changes the color on mobile browser --}}
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{config('app.name')}} | {{$title}}</title>
  <link rel="icon" href={{asset('images/suitcase.ico')}}>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/4ee982e396.js" crossorigin="anonymous"></script>
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
    <body class="mb-48" >
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24 ml-4" src={{asset("images/logoNoBg.png")}} alt="" class="logo"
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
                          <i class="fa-solid fa-gear"></i>
                          Manage Listings
                      </a>
                  </li>
                  <li>
                    <form action="/logout" class="inline" method="post"></form>
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
        <div class="flex justify-center m-4">
          <div class="ml-5 toast " role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <img src="{{asset("images/suitcase.ico")}}" width ="16px" class="rounded me-2" alt="...">
            <strong class="me-auto">Amdoker</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 pt-1 fa-solid fa-xmark" data-bs-dismiss="toast" aria-label="Close"></button>
            
          </div>
          <div class="toast-body">
            {{$Message}}.
          </div>
        </div>
        </div>
        
        <div style="display:flex;flex-wrap: wrap;justify-content: center;align-content: center;">
          <a style="align-item:center;justify-content:center" role="button" class="btn btn-primary" href="/listings">
            See Available Listings
          </a>

        </div>
       
        
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a href="/listings/create"
              class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
        </footer>
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            var toast = new bootstrap.Toast(document.querySelector('.toast'));
            toast.show();
          });
        </script>        
    </body>
</html>
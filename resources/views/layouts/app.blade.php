<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('/assets/css/estyle.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/css/vetrine.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

    
         

            <!-- Page Heading 
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif-->

             <!-- menu lateral-->
      <div class="sub-mennu">
      <div class="menu-lateral">
        <div class="logo">
            <h1>HB</h1>
        </div>
        @if(Auth::user()->funcionario)
        <div class="lar-menu-lateral">
       
             <div class="menu-lateral-links">
                 <a href="{{route('reserva.index')}}" class="">
                 <i class="fa fa-home"></i>
                  <span>Reservas</span>
                </a>                               
              </div> 

              <div class="menu-lateral-links">
                 <a href="{{route('quarto.index')}}" class="">
                 <i class="fa fa-laptop"></i>
                 <span>Quartos</span>
                </a>                               
              </div> 

              <div class="menu-lateral-links">
                 <a href="{{route('hospede.index')}}" class="">
                 <i class="far fa-registered"></i>
                  <span>Hospedes</span>
                </a>                               
              </div> 
         </div>
         @endif
         
         <div class="definicao">
         @if(Auth::user()->funcionario)
            <a href="{{route('user.index')}}">
            <i class="far fa-gear"></i>
             <span>Utilizadores</span>
            </a>
            @endif
         </div>

    
    </div>
 
    </div>
    

     <!-- Fim menu lateral-->

                  
         
         
    <div class="main" >
      @livewire('navigation-menu')

        @yield('corpo')

     </div>

        @stack('modals')

        @livewireScripts

        <style>
  #coll{
    border-radius: 11px;
background: #ffffff;
box-shadow:  5px 5px 10px #e3e3e3,
             -5px -5px 10px #ffffff;  
             margin: 20px;
  }


</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

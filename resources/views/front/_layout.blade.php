<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Gudea" rel="stylesheet"> 
        <link rel="stylesheet" href="/css/app.css">
        <title>Document</title>
        @stack('css')
    </head>
    <body>
        <header id="header">
            <div id="logo">
                <a href="/"><img src="/img/logo.png" alt="logo"></a>
            </div>

            <nav id="nav">
                @php 
                    $name = Route::currentRouteName();
                @endphp
                <ul>
                    <li><a href="{{ action('Front\FrontController@getBuy') }}" class="{{ $name == 'front.getBuy' || $name == 'front.getCard' ? 'active' : '' }}">Acheter</a></li>
                    <li><a href="{{ action('Front\FrontController@getSell') }}" class="{{ Route::currentRouteName() == 'front.getSell' ? 'active' : '' }}">Vendre</a></li>
                    <li><a href="#">L'agence</a></li>
                    <li><a href="#">Vendus</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <div class="has-background-black-ter" id="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <footer class="footer">

            <div class="content has-text-centered">
                {{ date('Y') }} - Tout droit réservé
            </div>
        </footer>
        @stack('js')
    </body>
</html>
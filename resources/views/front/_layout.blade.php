<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <ul>
                    <li><a href="{{ action('Front\FrontController@getBuy') }}">Acheter</a></li>
                    <li><a href="{{ action('Front\FrontController@getSell') }}">Vendre</a></li>
                    <li><a href="#">L'agence</a></li>
                    <li><a href="#">Vendus</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="footer">
            <div class="content has-text-centered">
                {{ date('Y') }} - Tout droit réservé
            </div>
        </footer>
        @stack('js')
    </body>
</html>
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
                    <li><a href="{{ action('Front\FrontController@getAgence') }}" class="{{ Route::currentRouteName() == 'front.getAgence' ? 'active' : '' }}">L'agence</a></li>
                    <li><a href="{{ action('Front\FrontController@getSold') }}" class="{{ Route::currentRouteName() == 'front.getSold' ? 'active' : '' }}">Vendus</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="footer">
            <div class="columns">
                <div class="column">
                    <div class="is-size-4">Site</div>
                    <ul>
                        <li><a href="{{ action('Front\FrontController@getBuy') }}">Acheter</a></li>
                        <li><a href="{{ action('Front\FrontController@getSell') }}">Vendre</a></li>
                        <li><a href="{{ action('Front\FrontController@getAgence') }}">Agence</a></li>
                        <li><a href="{{ action('Front\FrontController@getSold') }}">Vendus</a></li>
                        <li><a href="{{ action('Front\FrontController@getCgv') }}">CGV</a></li>
                    </ul>
                </div>
                <div class="column">
                    <div class="is-size-4">L'agence</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis enim reprehenderit facilis, modi consequuntur labore provident odio, eaque! Dignissimos nisi consequatur sint, pariatur et possimus! Delectus repellendus aut quisquam atque.
                    </p>
                    <div class="date">
                        {{ date('Y') }} Tous droits réservés.
                    </div>
                </div>
                <div class="column" id="social-icons">
                    <div class="is-size-4">Social</div>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
        </footer>
        @stack('js')
    </body>
</html>
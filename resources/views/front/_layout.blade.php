<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Gudea" rel="stylesheet"> 
        <link rel="stylesheet" href="/css/app.css">
        <title>{{ env('APP_NAME') }}</title>
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
                    <div>
                        <p>
                            Vendome Real Estate est une agence immobilière basée Place Vendôme spécialisée dans les biens d’exceptions.
                        </p>
                        <p>
                            Depuis 10 ans déjà sa situation géographique en fait l’agence de référence du quartier Vendome / Opéra / Tuileries/ Saint Honoré.
                        </p>
                        <p>
                            Nous avons également des antennes 25 rue du Chéroy dans le 17ème arrondissement ainsi que dans les Yvelines.
                        </p>
                        <p>
                            Notre réactivité et notre professionnalisme feront toute la différence lorsque vous déciderez de nous confier votre projet d’achat ou de vente d’un bien immobilier.
                        </p>
                        <p>
                            Nous sommes également spécialisés dans les transactions de parkings à Paris et en région parisienne. Nous avons des biens à la vente en lot pour investisseurs ou à l’unité.
                        </p>
                        <p>
                            N’hésitez pas à nous contacter pour nous faire part de votre projet.
                        </p>
                    </div>
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
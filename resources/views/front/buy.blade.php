@extends('front._layout')

@section('content')
    <div class="container">
        <div class="content">
            <h1 class="is-size-1">Acheter</h1>
            @for($i = 0; $i < 4; $i++)
                <div class="card card-margin">
                    <a href="/fiche">
                        <img src="/img/carousel-ipsum.jpeg" alt="card">
                    </a>
    
                    <div class="card-content">
                        <a href="{{ action('Front\FrontController@getCard') }}">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa, laborum tenetur.
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
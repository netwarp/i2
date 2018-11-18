@extends('front._layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <div id="background-form">
       <a href="/acheter" class="button is-link is-large">Voir les offres</a>
    </div>

    <h2 class="is-size-1 has-text-centered">Les nouveautés</h2>
    <div class="owl-carousel owl-theme" id="carousel-index">
        @foreach($cards as $card)
        <div class="item">
            <div>
                @php
                    $slug = $card->data['title'];
                    $slug = str_slug($slug);
                @endphp
                <a href="{{ action('Front\FrontController@getCard', [$card->id, $slug]) }}"><img src="/images/{{ $card->getFirstImage() }}" alt=""></a>
            </div>
            <h4>{{ $card->data['title'] }}</h4>
        </div>
        @endforeach
    </div>
@endsection

@push('js')
<script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(() => {
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
        })
    </script>
@endpush
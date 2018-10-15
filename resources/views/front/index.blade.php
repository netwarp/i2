@extends('front._layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <div id="background-form">
        <form action="#" method="POST">
            <div class="box">
                <div class="field is-horizontal has-addons">
                    <input class="input is-medium" placeholder="Name" type="text">
                    <input class="input is-medium" placeholder="Name" type="text">
                    <input class="input is-medium" placeholder="Name" type="text">

                    <button class="button is-medium is-dark" type="submit"><i class="fa fa-search"></i> Chercher</button>
                </div>
            </div>
        </form>
    </div>

    <h2 class="is-size-1 has-text-centered">Les nouveautés</h2>
    <div class="owl-carousel owl-theme" id="carousel-index">
        @foreach($cards as $card)
        <div class="item">
            <div>
                <a href="{{ action('Front\FrontController@getCard', $card->id) }}"><img src="/images/{{ $card->getFirstImage() }}" alt=""></a>
            </div>
            <h4>{{ $card->data['title'] }}</h4>
        </div>
        @endforeach
    </div>

    <div class="has-background-black-ter" id="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
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
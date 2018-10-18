@extends('front._layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <div id="background-form">
        <form action="{{ action('Front\FrontController@getBuy') }}" method="get">
            <div class="box">
                <div class="field">
                    <label class="field-label">Localisation</label>
                    <input type="text" class="input is-medium" placeholder="Localisation">
                </div>
                <div class="field">
                    <label class="field-label">Prix</label>
                    <div class="field-body">
                        <div class="field">
                            <input type="text" class="input is-medium" placeholder="Minimum" name="price-min">
                        </div>
                        <div class="field">
                            <input type="text" class="input is-medium" placeholder="Maximum" name="price-max">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="field-label">Surface</label>
                    <div class="field-body">
                        <div class="field">
                            <input type="text" class="input is-medium" placeholder="Minimum" name="surface-min">
                        </div>
                        <div class="field">
                            <input type="text" class="input is-medium" placeholder="Maximum" name="surface-max">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="field-label">Nombre de pièces</label>
                    <div class="field-body">
                        <div class="field">
                            <input type="text" class="input is-medium" placeholder="Minimum" name="rooms-min">
                        </div>
                        <div class="field">
                            <input type="text" class="input is-medium" placeholder="Maximum" name="rooms-max">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <button class="button is-dark is-medium is-fullwidth">
                        Chercher <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
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
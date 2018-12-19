@extends('front._layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <div id="background-form">
       <form method="GET" action="/acheter">     
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control is-expanded">
                            <div class="select is-medium">
                                <select name="vendre_louer">
                                    <option value="vendre">A vendre</option>
                                    <option value="louer">A louer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control is-expanded">
                            <div class="select is-medium">
                                <select name="type">
                                    <option value="" disabled selected="selected">Type de bien</option>
                                    <option value="Maison">Maison</option>
                                    <option value="Appartement">Appartement</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Parking">Parking</option>
                                    <option value="Particulier">Particulier</option>
                                    <option value="Vignoble">Vignoble</option>
                                    <option value="Terrain">Terrain</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" type="text" placeholder="Ville" name="ville">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control is-expanded has-icons-left has-icons-right">
                            <button type="submit" class="button is-info is-medium">Rechercher</button>
                        </div>
                    </div>
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
                autoplay: true,
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
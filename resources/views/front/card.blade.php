@extends('front._layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="content">
            <div class="box">
                <figure class="columns">
                    <div class="column is-8">

                        <img src="/images/{{ $card->getFirstImage() }}" id="img-big">   

                        <div class="owl-carousel owl-theme" id="carousel-index">
                            @foreach($card->getAllImages() as $image)
                            <div class="item">
                                <div>
                                    <a href="#"><img src="/images/{{ $card->data['images'][$image] }}" alt=""></a>
                                </div>
                            </div>
                            @endforeach
                        </div>                 
                    </div>
                    <div class="column has-text-left">

                        <h1 class="is-size-3 has-text-centered">{{ $card->data['title'] ?? '' }}</h1>
                        <a href="#" class="button is-medium is-link is-fullwidth">Contactez nous</a>
                        <hr>
                        <p>
                            {{ $card->data['description'] ?? '' }}
                        </p>

                        <div>
                            Surface: <span class="has-text-weight-bold">{{ $card->data['surface'] ?? '' }} m²</span>
                        </div>
                        <div>
                            Prix: <span class="has-text-weight-bold">{{ $card->data['price'] }} €</span>
                        </div>
                        <div>
                            Pièces: <span class="has-text-weight-bold">{{ $card->data['rooms'] }}</span>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
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

            var img_big = document.querySelector('#img-big');

            document.querySelectorAll('.item').forEach((item) => {
                item.addEventListener('click', (event) => {
                    var img_src = event.target.src;

                    img_big.src = img_src
                })
            })
        })
    </script>
@endpush
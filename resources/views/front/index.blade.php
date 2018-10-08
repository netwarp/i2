@extends('front._layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <div id="background-form">
        <form action="#">
            <div class="box">
                <div class="field is-horizontal">
                    <input class="input" placeholder="Name" type="text">
                    <input class="input" placeholder="Name" type="text">
                    <input class="input" placeholder="Name" type="text">
                </div>
            </div>
        </form>
    </div>

    <div class="owl-carousel owl-theme" id="carousel-index">
        @for($i = 0; $i < 4; $i++)
        <div class="item">
            <div>
                <a href="#"><img src="/img/carousel-ipsum.jpeg" alt=""></a>
            </div>
            <h4>{{ $i }}</h4>
        </div>
        @endfor
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
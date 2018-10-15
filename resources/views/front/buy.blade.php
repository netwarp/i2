@extends('front._layout')

@section('content')
    <div class="container">
        <div class="content">
            <h1 class="is-size-1">Acheter</h1>

            <div class="select">
                    <select id="select">
                        <option value="date">Par date</option>
                        <option value="price">Par prix</option>
                        <option value="surface">Par m²</option>
                        <option value="rooms">Par pièces</option>
                    </select>
                </div>
            <div id="cards">
                
                @for($i = 0; $i < 4; $i++)
                    @php 
                        $date = rand(10000, 1000000);
                        $surface = rand(50, 200);
                        $rooms = rand(1, 9);
                        $price = rand(50000, 100000);
                    @endphp
                    <div class="card card-margin" data-surface="{{ $surface }}" data-rooms="{{ $rooms }}" data-price="{{ $price }}" data-date="{{ $date }}">
                        <a href="/fiche" class="picture">
                            <img src="/img/carousel-ipsum.jpeg" alt="card">
                        </a>
        
                        <div class="card-content">
                            <h2>
                                <a href="{{ action('Front\FrontController@getCard') }}">
                                   {{ $i }} Lorem, ipsum dolor sit amet consectetur a 
                                </a>
                            </h2>
                            
                            <p>
                                {{ $i }} Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias beatae, vel ipsam impedit architecto doloribus iure nostrum iste qui unde, doloremque nesciunt vero ducimus. Voluptatem vitae harum tempore incidunt inventore!
                            </p>

                            <div class="data">
                                <div class="surface">
                                    {{ $surface }} m²
                                </div>
                                <div class="rooms">
                                    {{ $rooms }} pièces
                                </div>
                                <div class="price">
                                    {{ $price }} €
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>
@endsection

@push('js')
<script>

    var cards = []

    document.querySelectorAll('.card-margin').forEach((card) => {
        var obj = {
            surface: parseInt(card.dataset.surface),
            price: parseInt(card.dataset.price),
            rooms: parseInt(card.dataset.rooms),
            date: parseInt(card.dataset.date),

            html: card.outerHTML
        }
        
        cards.push(obj)
    })

    console.log(cards)

    document.querySelector('#select').addEventListener('change', (event) => {

        let criteria = event.target.value
        console.log(criteria)

        cards = cards.sort((a, b) => {
            if (a[criteria] > b[criteria]) 
                return 1 
            else if (a[criteria] < b[criteria])
                return -1 
            else 
                return 0
        })

        var new_dom = ''

        for (card of cards) {
            new_dom += card.html
        }

        document.querySelector('#cards').innerHTML = new_dom
    })
</script>
@endpush
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
                        <option value="room">Par pièces</option>
                    </select>
                </div>
            <div id="cards">
                
                @for($i = 0; $i < 4; $i++)
                    @php 
                        $surface = rand(50, 200);
                        $rooms = rand(1, 9);
                        $price = rand(50000, 100000);
                    @endphp
                    <div class="card card-margin" data-surface="{{ $surface }}" data-rooms="{{ $rooms }}" data-price="{{ $price }}">
                        <a href="/fiche" class="picture">
                            <img src="/img/carousel-ipsum.jpeg" alt="card">
                        </a>
        
                        <div class="card-content">
                            <h2>
                                <a href="{{ action('Front\FrontController@getCard') }}">
                                    Lorem, ipsum dolor sit amet consectetur a {{ $i }}
                                </a>
                            </h2>
                            
                            <p>
                                {{ $i }} Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias beatae, vel ipsam impedit architecto doloribus iure nostrum iste qui unde, doloremque nesciunt vero ducimus. Voluptatem vitae harum tempore incidunt inventore!
                            </p>

                            <div class="data">
                                <div>
                                    {{ $surface }} m²
                                </div>
                                <div>
                                    {{ $rooms }} pièces
                                </div>
                                <div>
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
            title: card.querySelector('h2 a').innerHTML.trim(),
            img: card.querySelector('img').src,
            p: card.querySelector('p').innerHTML.trim(),
            surface: parseInt(card.dataset.surface),
            price: parseInt(card.dataset.price),
            rooms: parseInt(card.dataset.rooms) 
        }
        
        cards.push(obj)
    })

    console.log(cards)

    var structure_card = document.querySelector('.card-margin')
    console.log(structure_card)

    document.querySelector('#select').addEventListener('change', (event) => {

        let criteria = event.target.value

        cards = cards.sort((a, b) => {
            if (a[criteria] > b[criteria]) 
                return 1 
            else if (a[criteria] < b[criteria])
                return -1 
            else 
                return 0
        })

      //  console.log(cards)
        var cards_dom = document.querySelector('#cards')

        for (card of cards) {
            structure_card.querySelector('h2 a').innerHTML = card.title
          
            structure_card.querySelector('img').src = card.img
           // structure_card.querySelector('p') = card.p 

            
            structure_card.dataset.surface = card.surface 
            structure_card.dataset.price = card.price 
            structure_card.dataset.rooms = cards.room
            
            console.log(structure_card)
           
            
        }
   
    })
</script>
@endpush
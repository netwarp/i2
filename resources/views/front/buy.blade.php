@extends('front._layout')

@section('content')
    <div class="container mt">
        <div class="content">
            <div class="select">
                    <select id="select">
                        <option value="date">Par date</option>
                        <option value="price">Par prix</option>
                        <option value="surface">Par m²</option>
                        <option value="rooms">Par pièces</option>
                    </select>
                </div>
            <div id="cards">
                @foreach($cards as $card)
                    @php
                        $slug = $card->data['title'];
                        $slug = str_slug($slug);
                    @endphp

                    <div class="card card-margin" data-surface="{{ $card->data['surface'] }}" data-rooms="{{ $card->data['rooms'] }}" data-price="{{ $card->data['price'] }}" data-date="{{ $card->created_at }}">

                        <a href="{{ action('Front\FrontController@getCard', [$card->id, $slug]) }}" class="picture">
                            <img src="/images/{{ $card->getFirstImage() }}" alt="card">
                        </a>
        
                        <div class="card-content">
                            <h2>
                                <a href="{{ action('Front\FrontController@getCard', [$card->id, $slug]) }}">
                                   {{ $card->data['title'] }}
                                </a>
                            </h2>
                            
                            <p>
                                {{ $card->data['description'] }}
                            </p>


                            <div class="data">
                                <div class="surface">
                                    {{ $card->data['surface'] }} m²
                                </div>
                                <div class="rooms">
                                    {{ $card->data['rooms'] }} pièces
                                </div>
                                <div class="price">
                                    {{ $card->data['price'] }} €
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
@extends('front._layout')

@push('css')
<style>
    ::placeholder { /* Most modern browsers support this now. */
       color: #000 !important;
    }
</style>
@endpush

@section('content')
    <div class="container mt">
        <div>
            Votre recherche
        </div>
        <div class="content">
            <form method="GET" action="/acheter">    
                <div class="select">
                    <select name="tri">
                        <option value="" disabled {{ Request::has('tri') ? '' : 'selected' }}>Trier</option>
                        <option value="date" {{ Request::get('tri') === 'date' ? 'selected' : '' }}>Par date</option>
                        <option value="price" {{ Request::get('tri') === 'price' ? 'selected' : '' }}>Par prix</option>
                        <option value="surface" {{ Request::get('tri') === 'surface' ? 'selected' : '' }}>Par m²</option>
                        <option value="rooms" {{ Request::get('tri') === 'rooms' ? 'selected' : '' }}>Par pièces</option>
                    </select>
                </div>
                <div class="select">
                    <select name="type">
                        <option value="" disabled {{ Request::has('type') ? '' : 'selected' }}>Type de bien</option>
                        <option value="">Tous</option>
                        <option value="Maison" {{ Request::get('type') === 'Maison' ? 'selected' : '' }}>Maison</option>
                        <option value="Appartement" {{ Request::get('type') === 'Appartement' ? 'selected' : '' }}>Appartement</option>
                        <option value="Hotel" {{ Request::get('type') === 'Hotel' ? 'selected' : '' }}>Hotel</option>
                        <option value="Parking" {{ Request::get('type') === 'Parking' ? 'selected' : '' }}>Parking</option>
                        <option value="Particulier" {{ Request::get('type') === 'Particulier' ? 'selected' : '' }}>Particulier</option>
                        <option value="Vignoble" {{ Request::get('type') === 'Vignoble' ? 'selected' : '' }}>Vignoble</option>
                        <option value="Terrain" {{ Request::get('type') === 'Terrain' ? 'selected' : '' }}>Terrain</option>
                    </select>
                </div>
                <div class="select">
                    <select name="vendre_louer">
                        <option value="" disabled {{ Request::has('vendre_louer') ? '' : 'selected' }}>Vendre / louer</option>
                        <option value="">Tous</option>
                        <option value="vendre" {{ Request::get('vendre_louer') === 'vendre' ? 'selected' : '' }}>Vente</option>
                        <option value="louer" {{ Request::get('vendre_louer') === 'louer' ? 'selected' : '' }}>Location</option>
                    </select>
                </div>
                <span>
                    <input name="ville" class="input" type="text" placeholder="Localisation" style="width: inherit;" value="{{ Request::get('ville') ?? '' }}">
                </span>
                <button type="submit" class="button is-info">Rechercher</button>
            </form>

            <div id="cards">
                @forelse($cards as $card)
                    <div class="card card-margin {{ $card->data['sold'] ? 'sold' : '' }}">
                        <a href="/fiche/{{ $card->id }}/{{ str_slug($card->data['title']) }}" class="picture">
                            <img src="/images/{{ $card->getFirstImage() }}" alt="appartement image">
                        </a>
                        <div class="card-content">
                            <h2>
                                <a href="/fiche/{{ $card->id }}/{{ str_slug($card->data['title']) }}">
                                    {{ $card->data['title'] }}
                                </a>
                            </h2>
                            <div class="description">
                                @markdown($card->data['description'])
                            </div>

                            <div class="data">
                                <div>
                                    {{ $card->data['price'] }} €
                                </div>
                                <div>
                                    {{ $card->data['surface'] }} m²
                                </div>
                                <div>
                                    {{ $card->data['rooms'] }} pièces
                                </div>
                                <div>
                                    {{ $card->data['type'] }}
                                </div>
                                <div>
                                    {{ $card->data['localisation'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        Aucun résultat
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
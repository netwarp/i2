@extends('front._layout')

@push('css')
<style>
    fieldset {
        padding: 2rem;
        border: 1px solid #c4c4c4;
        margin-bottom: 4rem;
    }

    legend {
        font-size: 1.4rem;
        padding: 1rem;
    }

    label {
        margin-right: 1rem;
        min-width: 100px;
        font-weight: bold;
    }

    .textarea {
        min-width: inherit;
    }
</style>
@endpush

@section('content')
    <div class="container mt">
        <div class="content">
            <div class="box">
                @if(session('success'))
                    <div class="notification is-primary">
                        {{ session('success') }}
                    </div>
                @elseif($errors->any())
                    <div class="notification is-danger">
                        <ul>
                             @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ action('Front\FrontController@postSell') }}" method="POST">
                    @csrf

                    <fieldset>
                        <legend>Vos coordonnées</legend>
                        <div class="field is-grouped">
                            <label class="label">Civilité</label>
                            <input class="input" type="text" placeholder="Text input" name="civilite" required value="{{ old('civilite') }}">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Prénom *</label>
                            <input class="input" type="text" placeholder="Text input" name="prenom" required value="{{ old('prenom') }}">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Nom *</label>
                            <input class="input" type="text" placeholder="Text input" name="nom" required value="{{ old('nom') }}">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Email *</label>
                            <input class="input" type="email" placeholder="Text input" name="email" required value="{{ old('email') }}">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Télephone *</label>
                            <input class="input" type="text" placeholder="Text input" name="tel" required value="{{ old('tel') }}">
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Votre demande</legend>
                            <div class="field is-grouped">
                                <label>Message</label>
                                <textarea class="textarea" placeholder="Votre message" name="message"></textarea>
                            </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Vous recherchez ?</legend>
                        <div class="field is-grouped">
                            <label>Type de bien</label>
                            <div class="select">
                                <select name="type">
                                    <option value="Appartement">Appartement</option>
                                    <option value="Parking">Parking</option>
                                    <option value="Maison">Maison</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Terrain">Terrain</option>
                                </select>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Code postal</label>
                            <input class="input" type="text" placeholder="Text input" name="postal" required value="{{ old('postal') }}">
                        </div>
                    </fieldset>
                    <button type="submit" class="button is-success is-large is-fullwidth">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
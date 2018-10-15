@extends('front._layout')

@push('css')
<style>
    fieldset {
        padding: 2rem;
        border: 1px solid #eee;
    }

    legend {
        font-size: 1.4rem;
        padding: 1rem;
    }

    label {
        margin-right: 1rem;
        min-width: 100px;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="content">
            <div class="box">
                <form action="{{ action('Front\FrontController@postSell') }}" method="POST">
                    @csrf

                    <fieldset>
                        <legend>Vos coordonnées</legend>
                        <div class="field is-grouped">
                            <label class="label">Civilité</label>
                            <input class="input" type="text" placeholder="Text input">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Prénom *</label>
                            <input class="input" type="text" placeholder="Text input">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Nom *</label>
                            <input class="input" type="text" placeholder="Text input">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Email *</label>
                            <input class="input" type="email" placeholder="Text input">
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Télephone *</label>
                            <input class="input" type="email" placeholder="Text input">
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Votre demande</legend>
                            <div class="field is-grouped">
                                <label for="#">Message</label>
                                <div class="control">
                                    <textarea class="textarea" type="text" placeholder="Danger textarea"></textarea>
                                </div>
                            </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Vous recherchez ?</legend>
                        <div class="select field is-grouped">
                            <label for="#">Vous recherchez</label>
                            <select>
                                <option>Select dropdown</option>
                                <option>With options</option>
                            </select>
                        </div>
                        <div class="field is-grouped">
                            <label class="label">Nombre de pièces</label>
                            <input class="input" type="text" placeholder="Text input">
                        </div>
                    </fieldset>
                    <button type="submit">Envoie</button>
                </form>
            </div>
        </div>
    </div>
@endsection
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
                     
                                    <textarea class="textarea" placeholder="e.g. Hello world"></textarea>
                           
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
                    <button type="submit" class="button is-success is-large is-fullwidth">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
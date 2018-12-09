@extends('front._layout')

@push('css')
<style>
    ::placeholder { /* Most modern browsers support this now. */
       color: #000 !important;
    }
</style>
@endpush

@section('content')
    <div class="container mt" id="app">
        <div>
            Votre recherche
        </div>
        <div class="content">
            <div class="select">
                <select @change="sort(tri)" v-model="tri">
                    <option value="" disabled selected>Trier</option>
                    <option value="date">Par date</option>
                    <option value="price">Par prix</option>
                    <option value="surface">Par m²</option>
                    <option value="rooms">Par pièces</option>
                </select>
            </div>
            <div class="select">
                <select @change="sortType(type)" v-model="type">
                    <option value="" disabled selected>Type de bien</option>
                    <option value="Maison">Maison</option>
                    <option value="Appartement">Appartement</option>
                    <option value="Hotel">Hotel</option>
                    <option value="Parking">Parking</option>
                    <option value="Particulier">Particulier</option>
                    <option value="Vignoble">Vignoble</option>
                    <option value="Terrain">Terrain</option>
                </select>
            </div>
            <div class="select">
                <select id="">
                    <option value="Vente">Vente</option>
                    <option value="Location">Location</option>
                </select>
            </div>
            <span>
                <input id="search" class="input" type="search" placeholder="Localisation" style="width: inherit;" v-model="localisation" @keyup="localisationFilter(localisation)">
            </span>

            <div id="cards">
                <div class="card card-margin" v-for="card in cards" v-if="card.visible">
                    <a :href="'/fiche/' + card.id + '/' + card.slug" class="picture">
                        <img :src="'/images/' + card.img" alt="card">
                    </a>
                    <div class="card-content">
                        <h2>
                            <a :href="'/fiche/' + card.id + '/' + card.slug">
                                @{{ card.data.title }}
                            </a>
                        </h2>
                        <div class="description">
                            @{{ card.data.description }}
                        </div>

                        <div class="data">
                            <div class="surface">
                                @{{ card.data.surface }} m²
                            </div>
                            <div class="rooms">
                                 @{{ card.data.rooms }} pièces
                            </div>
                            <div class="price">
                                 @{{ card.data.price }} €
                            </div>
                            <div class="type">
                                 @{{ card.data.type }}
                            </div>
                            <div class="type">
                                @{{ card.data.localisation }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',

        created() {
            this.fetchData()  
        },

        data: {
            cards: [],
            tri: '',
            type: '',
            localisation: ''
        },

        methods: {
            fetchData() {
                fetch('/api/cards')
                .then((response) => {
                    return response.json()
                })
                .then((data) => {
                    this.cards = data
                    console.log(this.cards)
                })
            },

            sort(tri) {
                switch (tri) {
                    case 'date': 
                        this.cards.sort((a, b) => {
                            return a.timestamp - b.timestamp
                        })
                        break
                    case 'price': 
                        this.cards.sort((a, b) => {
                            return a.data.price - b.data.price
                        })
                        break
                    case 'surface': 
                        this.cards.sort((a, b) => {
                            return a.data.surface - b.data.surface
                        })
                        break
                    case 'rooms': 
                        this.cards.sort((a, b) => {
                            return a.data.rooms - b.data.rooms
                        })
                        break
                    default:
                        console.log('ok')
                }
                //console.log(this.cards)
            },
            
            sortType(type) {
                console.log('okokok')
                return this.cards.sort((a, b) => {
                    return b.type == type
                })
            },

            localisationFilter(localisation) {

                this.cards.forEach((card) => {
                    if (card.data.localisation.includes(localisation)) {
                        card.visible = true
                    } else {
                        card.visible = false
                    }
                })
            }            
        },

        computed: {
         
        }
    })
</script>
@endpush
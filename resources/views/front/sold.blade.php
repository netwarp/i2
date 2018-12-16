@extends('front._layout')

@section('content')
	<div class="container">
		<div class="content">
			<div id="cards">
				@foreach($cards as $card)
					<div class="card card-margin sold">
						<a href="/fiche/{{ $card->id }}/{{ str_slug($card->data['title']) }}" class="picture">
							<img src="/images/{{ $card->getFirstImage() }}">
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
				@endforeach
			</div>
		</div>
	</div>
@endsection
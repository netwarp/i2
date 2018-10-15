@extends('dashboard._layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1>Fiches</h1>
						<br>
						<a href="{{ action('Dashboard\CardsController@create') }}" class="btn btn-success">Nouveau</a>
						<br><br>
						<table class="table table-stripped">
							<thead>
								<th>Id</th>
								<th>Titre</th>
								<th>Prix</th>
								<th>Surface</th>
								<th>Pièces</th>
								<th>Vendu</th>
								<th>Aperçu</th>
								<th>Action</th>
							</thead>
							<tbody>
								@foreach($cards as $card)
									<tr>
										<td>{{ $card->id }}</td>
										<td>{{ $card->data['title'] }}</td>
										<td>{{ $card->data['price'] }}</td>
										<td>{{ $card->data['surface'] }}</td>
										<td>{{ $card->data['rooms'] }}</td>
										<td>{{ $card->data['sold'] ? 'Oui' : 'Non' }}</td>
										<td>
											<a href="{{ action('Dashboard\CardsController@edit', $card->id) }}">
												<img src="/images/{{ $card->getFirstImage() }}" alt="" width="100">
											</a>
										</td>
										<td class="d-flex justify-content-between">
											<a href="{{ action('Dashboard\CardsController@edit', $card->id) }}" class="btn btn-info">Éditer</a>

											<form action="{{ action('Dashboard\CardsController@destroy', $card->id) }}" method="POST">
												@csrf
												@method('delete')
												<button type="submit" class="btn btn-danger">Supprimer</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
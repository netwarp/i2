@extends('dashboard._layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h1 class="text-center">Fiches: {{ $cards }}</h1>
						<a href="{{ action('Dashboard\CardsController@index') }}" class="btn btn-primary btn-block">Voir les fiches</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h1 class="text-center">Message{{ $messages > 1 ? 's' : '' }}: {{ $messages }}</h1>
						<a href="{{ action('Dashboard\MessagesController@index') }}" class="btn btn-primary btn-block">Voir les messages</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@extends('dashboard._layout')

@push('css')
<style>
	.d-flex {
		margin-bottom: 1rem;
	}

	.k {
		margin-right: 1rem;
	}
</style>
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1>Message {{ $message->id }}</h1>
						<div class="d-flex">
							<div class="k">Civilité: </div>
							<div class="v">{{ $message->data->civilite ?? '' }}</div>
						</div>
						<div class="d-flex">
							<div class="k">Nom: </div>
							<div class="v">{{ $message->data->nom ?? '' }}</div>
						</div>
						<div class="d-flex">
							<div class="k">Prénom: </div>
							<div class="v">{{ $message->data->prenom ?? '' }}</div>
						</div>
						<div class="d-flex">
							<div class="k">Email: </div>
							<div class="v">{{ $message->data->email ?? '' }}</div>
						</div>
						<div class="d-flex">
							<div class="k">Email: </div>
							<div class="v">{{ $message->data->email ?? '' }}</div>
						</div>
						<div class="d-flex">
							<div class="k">Message: </div>
							<div class="v">{{ $message->data->message ?? '' }}</div>
						</div>
						<div class="d-flex">
							<div class="k">Code postal: </div>
							<div class="v">{{ $message->data->postal ?? '' }}</div>
						</div>
					</div>
					<div class="card-footer">
						<form action="{{ action('Dashboard\MessagesController@destroy', $message->id) }}" method="POST">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger">Supprimer</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
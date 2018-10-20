@extends('dashboard._layout')

@push('css')
	<link rel="stylesheet" href="/css/markdown.css">
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1>Agence</h1>

						<form action="{{ action('Dashboard\DashboardController@postAgence') }}" method="POST">
							@csrf

							<div class="form-group">
								<textarea name="content" cols="30" rows="10">{{ $content ?? '' }}</textarea>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Envoyer</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script src="/js/markdown.js"></script>
	<script>
		var simplemde = new SimpleMDE();
	</script>
@endpush
@extends('front._layout')

@push('css')
<style>
	.container {
		min-height: 70vh;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>
@endpush

@section('content')
	<div class="container">
		<div class="content">
			<div class="box">
				<h1 class="is-size-1">Login</h1>
				@if(session('error'))
					<div class="notification is-danger">
						<button class="delete"></button>
						{{ session('error') }}
					</div>
				@endif
				<form action="/login" method="POST">
					 @csrf
					<div class="field">
						<label for="#">Nom</label>
						<input type="text" class="input" name="name">
					</div>
					<div class="field">
						<label for="#">Mot de passe</label>
						<input type="password" class="input" name="password">
					</div>
					<div class="field">
						<button type="submit" class="button is-info is-fullwidth">Envoyer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
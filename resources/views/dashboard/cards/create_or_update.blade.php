@extends('dashboard._layout')

@push('css')
<style>
	.img-upload {
		border: 1px solid #999;
		background: #f3f3f3;
		padding: 1rem;
		margin: 0.4rem;
	}
</style>
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						{!! Form::open($params) !!}					
							<fieldset>
								<legend>Information</legend>
								<div class="form-group">
									<label for="#">Titre</label>
									<input type="text" class="form-control" name="title" value="{{ $card->data['title'] ?? '' }}">
								</div>

								<div class="form-group">
									<label for="#">Surface</label>
									<input type="number" class="form-control" name="surface" value="{{ $card->data['surface'] ?? '' }}">
								</div>

								<div class="form-group">
									<label for="#">Pièces</label>
									<input type="number" class="form-control" name="rooms" value="{{ $card->data['rooms'] ?? '' }}">
								</div>

								<div class="form-group">
									<label for="#">Prix</label>
									<input type="number" class="form-control" name="price" value="{{ $card->data['price'] ?? '' }}">
								</div>

								<div class="form-group">
									<label for="#">Type</label>
									<select class="form-control" name="type">
										<option value="maison" {{ isset($card) && $card->data['type'] == 'maison' ? 'selected' : '' }}>Maison</option>
										<option value="appartement" {{ isset($card) && $card->data['type'] == 'appartement' ? 'selected' : '' }}>Appartement</option>
										<option value="hotel" {{ isset($card) && $card->data['type'] == 'hotel' ? 'selected' : '' }}>Hotel</option>
										<option value="parking" {{ isset($card) && $card->data['type'] == 'parking' ? 'selected' : '' }}>Parking</option>
									</select>
								</div>

								<div class="form-group">
									<label for="#">Contenu</label>
									<textarea name="description" rows="8" class="form-control">{{ $card->data['description'] ?? '' }}</textarea>
								</div>
								<hr>
								<div class="form-group">
									<label for="#">Vendu</label>
									<select class="form-control" name="sold">
										<option value="0">Non</option>
										<option value="1" {{ $card->data['sold'] ?? 'selected' }}>Oui</option>
									</select>
								</div>
							</fieldset>

							<fieldset>
								<legend>Images</legend>
								<div class="alert alert-warning">
									Toutes les images doivent être à la même dimension et au format jpeg. <br>
									<b><a href="https://www.designer.io/#download">Gravit Designer</a></b> <br>
									La première image sera celle utilisée pour l'aperçu dans le carousel.
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 d-flex flex-wrap">
											@for($i=0; $i < 6; $i++)
												
												<div class="img-upload">
													@if(isset($card->data['images'][$i]))
														<img src="/images/{{ $card->data['images'][$i] }}" alt="" width="80">
													@endif
													<label for="#">Image {{ $i +1 }}</label> <br>
													<input type="file" name="files[{{ $i }}]" accept="image/*">
												</div>
											@endfor
										</div>
									</div>
									
								</div>
								<hr>
							</fieldset>
							
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Envoyer</button>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
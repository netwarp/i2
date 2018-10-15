@extends('front._layout')

@section('content')
	<div class="container">
		<div class="content">
			<div class="box">
				@markdown($content)
			</div>
		</div>
	</div>
@endsection
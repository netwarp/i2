@extends('front._layout')

@section('content')
	<div class="container mt">
		<div class="content">
			<div class="box">
				@markdown($content)
			</div>
		</div>
	</div>
@endsection
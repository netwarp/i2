@extends('dashboard._layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1>Messages</h1>
						<br>
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Email</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach($messages as $message)
									@php 
										$message_data = (object) json_decode($message->data);
									@endphp
									<tr>
										<td><a href="{{ action('Dashboard\MessagesController@show', $message->id) }}">{{ $message_data->nom ?? '' }}</a></td>
										<td><a href="{{ action('Dashboard\MessagesController@show', $message->id) }}">{{ $message_data->prenom ?? '' }}</a></td>
										<td><a href="{{ action('Dashboard\MessagesController@show', $message->id) }}">{{ $message_data->email ?? '' }}</a></td>
										<td>{{ date('d F Y h:i:s', strtotime($message_data->created_at->date)) }}</td>
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
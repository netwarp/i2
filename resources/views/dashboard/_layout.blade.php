<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/admin.css">
		<title>Dashboard</title>
		@stack('css')
	</head>
	<body>
		<div class="container-fluid">
			<div class="row" id="top-bar">
				<div id="admin-logo">
					<a href="{{ action('Dashboard\DashboardController@getIndex') }}">Admin</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3" id="sidebar">
					
					<div class="list-group">
						<a href="{{ action('Dashboard\CardsController@index') }}" class="list-group-item list-group-item-action {{ str_contains(Route::currentRouteName(), 'cards') ? 'active' : '' }}">
							Fiches
						</a>
						<a href="{{ action('Dashboard\DashboardController@getAgence') }}" class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'dashboard.getAgence' ? 'active' : '' }}">L'agence</a>
						<a href="{{ action('Dashboard\DashboardController@getCgv') }}" class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'dashboard.getCgv' ? 'active' : '' }}">Mentions légales</a>
						<a href="/" class="list-group-item list-group-item-action" target="_blank">Site publique</a>
					</div>
				</div>
				<div class="col-md-9">
					<main>
						@if(session('success'))
							<div class="container">
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							</div>
						@elseif($errors->any())	
							<div class="container">
								<div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							</div>
						@endif

						@yield('content')
					</main>
				</div>
			</div>
		</div>
		@stack('js')
	</body>
</html>
@extends('layout')

@section('content')
	<main class="col-md-8">
		<h1>Bank of Death <small>Once you deposit, you never withdraw.</small></h1>
		<p class="lead"></p>
	</main>

	<aside class="col-md-4">
		<h2>Login</h2>
		{{ Form::open() }}
		<ul class="list-unstyled">
			<li class="form-group">{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username'] ) }}</li>
			<li class="form-group">{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}</li>
			<li class="form-group">{{ Form::submit('Log in', ['class' => 'form-control btn btn-primary']) }}</li>
		</ul>
		{{ Form::close() }}
	</aside>
@stop
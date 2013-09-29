<aside class="col-md-4">
	@if (Auth::guest())
		<h2>Login</h2>
		{{ Form::open(['route' => 'login']) }}
		<ul class="list-unstyled">
			<li class="form-group">
				{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username'] ) }}
			</li>
			<li class="form-group">
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
			</li>
			<li class="form-group">
				{{ Form::submit('Log in', ['class' => 'form-control btn btn-primary']) }}
			</li>
		</ul>
		{{ Form::close() }}
	@else
		<h2>Logged in</h2>
	@endif
</aside>
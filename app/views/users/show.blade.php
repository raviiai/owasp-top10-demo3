@extends('layout')

@section('content')
	<main class="col-md-8">
		<h1>{{{ $user->name }}}</h1>

		<h2>Accounts</h2>
		<table class="table">
			@foreach ($user->accounts() as $account)
			<tr>
				<td>{{ HTML::linkRoute('accounts.show', $account->name, $account->id) }}</td>
				<td>${{{ $account->balance() }}}</td>
			</tr>
			@endforeach
		</table>

	</main>

	@include('partials.sidebar')
@stop
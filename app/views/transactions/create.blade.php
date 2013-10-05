@extends('layout')

@section('content')
	<main class="col-md-8">
		<h1>New transaction</h1>

		{{ Form::open(['route' => 'transactions.store']) }}
		<ul class="list-inline">
			<li class="form-group">
				{{ Form::label('sender_account_id', 'From account:') }}
				{{ Form::select('sender_account_id', \Bank\Support\Arr::toMap(Auth::user()->accounts(), 'id', 'name'), null, ['class' => 'form-control', 'placeholder' => 'Username'] ) }}
			</li>
			<li class="form-group">
				{{ Form::label('receiver_account_id', 'To account:') }}
				{{ Form::text('receiver_account_id', null, ['class' => 'form-control', 'placeholder' => '1234'] ) }}
			</li>
			<li class="form-group">
				{{ Form::label('amount', 'Amount:') }}
				{{ Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount'] ) }}
			</li>
			<li class="form-group">
				{{ Form::label('text', 'Comment:') }}
				{{ Form::text('text', null, ['class' => 'form-control', 'placeholder' => 'Comment'] ) }}
			</li>
			<li class="form-group">
				{{ Form::submit('Send money', ['class' => 'form-control btn btn-primary']) }}
			</li>
		</ul>
		{{ Form::close() }}

	</main>

	@include('partials.sidebar')
@stop
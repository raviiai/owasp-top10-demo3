@extends('layout')

@section('content')
	<main class="col-md-8">
		<h1>{{{ $account->name }}}</h1>

		<h2>Transactions</h2>
		<table class="table">
			@foreach ($account->transactions() as $transaction)
			<tr>
				<td class="tight">{{ date('Y-m-d', $transaction->created_at) }}</td>
				<td>{{{ $transaction->text }}}</td>
				<td class="tight {{ ($transaction->isDepositTo($account)) ? 'deposit' : 'withdrawal' }}">
					${{{ $transaction->amount }}}
				</td>
			</tr>
			@endforeach
			<tfoot>
			<tr class="balance">
				<td></td>
				<th>Total:</th>
				<td>${{ $account->balance() }}</td>
			</tr>
			</tfoot>
		</table>

	</main>

	@include('partials.sidebar')
@stop
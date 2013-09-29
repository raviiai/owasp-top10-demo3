<?php

class Transaction extends AbstractModel {
	protected static $table = 'transactions';

	public function isDepositTo($account)
	{
		return $this->receiver_account_id === $account->id;
	}

	public static function findByAccount($account)
	{
		if (is_object($account)) {
			$account = $account->id;
		}

		return static::map(
			DB::table(static::$table)
			->where('sender_account_id', $account)
			->orWhere('receiver_account_id', $account)
			->orderBy('created_at', 'desc')
			->get()
		);
	}

}
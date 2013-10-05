<?php

class Account extends AbstractModel {
	protected static $table = 'accounts';

	public function transactions()
	{
		return Transaction::findByAccount($this);
	}

	public function getOwner()
	{
		return User::findById($this->user_id);
	}

	public function balance()
	{
		$in = DB::table('transactions')->where('receiver_account_id', $this->id)->sum('amount');
		$out = DB::table('transactions')->where('sender_account_id', $this->id)->sum('amount');
		return $in - $out;
	}

	public static function findByUser($user)
	{
		if (is_object($user)) {
			$user = $user->id;
		}

		return static::map(DB::table(static::$table)->where('user_id', $user)->get());
	}

}
<?php

class User extends AbstractModel {
	protected static $table = 'users';

	public function accounts()
	{
		return Account::findByUser($this);
	}

	public static function findByUsername($username)
	{
		return static::map(DB::table(static::$table)->where('username', $username)->first());
	}

}
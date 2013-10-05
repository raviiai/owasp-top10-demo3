<?php

use Illuminate\Auth\UserInterface;

class User extends AbstractModel implements UserInterface  {
	protected static $table = 'users';

	public function accounts()
	{
		return Account::findByUser($this);
	}

	public static function findByUsername($username)
	{
		return static::map(DB::table(static::$table)->where('username', $username)->first());
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->id;
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

}
<?php namespace Bank\Auth;

class BankUserProvider implements \Illuminate\Auth\UserProviderInterface {

	/**
	 * Retrieve a user by their unique identifier.
	 *
	 * @param  mixed  $identifier
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	public function retrieveById($identifier)
	{
		return \User::findById($identifier);
	}

	/**
	 * Retrieve a user by the given credentials.
	 *
	 * @param  array  $credentials
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	public function retrieveByCredentials(array $credentials)
	{
		if (array_key_exists('id', $credentials)) {
			return \User::findById($credentials['id']);
		}

		if (array_key_exists('username', $credentials)) {
			return \User::findByUsername($credentials['username']);
		}

		return null;
	}

	/**
	 * Validate a user against the given credentials.
	 *
	 * @param  \Illuminate\Auth\UserInterface  $user
	 * @param  array  $credentials
	 * @return bool
	 */
	public function validateCredentials(\Illuminate\Auth\UserInterface $user, array $credentials)
	{
		$plain = $credentials['password'];

		return sha1($plain) === $user->getAuthPassword();
	}

}

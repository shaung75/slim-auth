<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Users Model
 *
 * @author Shaun Gill
 */
class User extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'level',
		'trusts_idtrusts',
	];

	/**
	 * Changes user password
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->update([
			'password' => password_hash($password, PASSWORD_DEFAULT)
		]);
	}
}
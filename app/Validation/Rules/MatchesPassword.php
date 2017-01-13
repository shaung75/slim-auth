<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

/**
 * MatchesPassword Class
 *
 * @author Shaun Gill
 */
class MatchesPassword extends AbstractRule
{
	/**
	 * Password
	 * @var String
	 */
	protected $password;

	public function __construct($password)
	{
		$this->password = $password;
	}

	/**
	 * Checks the user has correctly entered the current password
	 * @param  string $input Current password
	 * @return boolean        
	 */
	public function validate($input)
	{
		return password_verify($input, $this->password);
	}
}
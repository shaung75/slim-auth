<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

/**
 * EmailAvailable Class
 *
 * @author Shaun Gill
 */
class EmailAvailable extends AbstractRule
{
	/**
	 * Checks if email address is unique
	 * @param  string $input Email address
	 * @return boolean        
	 */
	public function validate($input)
	{
		return User::where('email', $input)->count() === 0;
	}
}
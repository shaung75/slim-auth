<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

/**
 * MatchesPasswordException
 *
 * Throws error if password does not match old when trying to change
 *
 * @author Shaun Gill
 */
class MatchesPasswordException extends ValidationException
{
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Old password does not match',
		],
	];
}
<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

/**
 * EmailAvailableException
 *
 * Error thrown if email is not unique
 *
 * @author Shaun Gill
 */
class EmailAvailableException extends ValidationException
{
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Email is already taken.',
		],
	];
}
<?php

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

/**
 * Validator class
 *
 * @author Shaun Gill
 */
class Validator
{
	/**
	 * Errors container
	 * @var array
	 */
	protected $errors;

	/**
	 * Builds an array on checked rules
	 * @return array
	 */
	public function validate($request, array $rules)
	{
		foreach ($rules as $field => $rule) {
			try {
				$rule->setName(ucfirst($field))->assert($request->getParam($field));
			} catch (NestedValidationException $e) {
				$this->errors[$field] = $e->getMessages();
			}
		}

		$_SESSION['errors'] = $this->errors;

		return $this;
	}

	/**
	 * Checks if there are any errors
	 * @return boolean 
	 */
	public function failed()
	{
		return !empty($this->errors);
	}
}
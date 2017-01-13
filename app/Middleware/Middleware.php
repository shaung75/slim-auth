<?php

namespace App\Middleware;

/**
 * Main Middleware Class
 *
 * @author Shaun Gill
 */
class Middleware
{
	protected $container;

	/**
	 * Provides access to $container to child classes
	 */
	public function __construct($container)
	{
		$this->container = $container;
	}
}
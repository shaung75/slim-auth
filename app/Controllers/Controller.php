<?php

namespace App\Controllers;

/**
 * Main Controller Class
 *
 * @author Shaun Gill
 */
class Controller
{
	protected $container;

	public function __construct($container)
	{
		$this->container = $container;
	}

	public function __get($property) 
	{
		if($this->container->{$property}) {
			return $this->container->{$property};
		}
	}
}
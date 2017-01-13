<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

/**
 * HomeController Class
 *
 * @author Shaun Gill
 */
class HomeController extends Controller
{
	/**
	 * Displays Home View
	 */
	public function index($request, $response)
	{
		return $this->view->render($response, 'home.twig');
	}
}

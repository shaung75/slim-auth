<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

/**
 * HomeController Class
 *
 * @author Shaun Gill
 */
class AdminController extends Controller
{
	/**
	 * Displays Admin View
	 */
	public function index($request, $response)
	{
		return $this->view->render($response, 'admin.twig');
	}
}

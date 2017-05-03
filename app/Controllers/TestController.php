<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use App\Models\Test;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

/**
 * HomeController Class
 *
 * @author Shaun Gill
 */
class TestController extends Controller
{
	/**
	 * Displays Test View
	 */
	public function index($request, $response)
	{
		return $this->view->render($response, 'schemes/test.twig');
	}

	public function newScheme($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace(),
			'name' => v::notEmpty()->alpha(),
		]);

		if($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('test'));
		}

		$test = new Test();

		$test->field1 = $request->getParam('email');
		$test->field2 = $request->getParam('name');

		$test->save();

		// Update Relationships...		
		$test->trusts()->attach($request->getParam('trust'));

		$this->flash->addMessage('info', 'Stuff been intseted');

		return $response->withRedirect($this->router->pathFor('test'));
	}
}

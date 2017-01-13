<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

/**
 * PasswordController class - all things password related
 *
 * @author Shaun Gill
 */
class PasswordController extends Controller
{
	/**
	 * Display password change form
	 */
	public function getChangePassword($request, $response)
	{
		return $this->view->render($response, 'auth/password/change.twig');
	}

	/**
	 * [postChangePassword description]
	 * @param  [type] $request  [description]
	 * @param  [type] $response [description]
	 * @return [type]           [description]
	 */
	public function postChangePassword($request, $response)
	{
		var_dump($response); die();
		$validation = $this->validator->validate($request, [
			'password_old' => v::notEmpty()->matchesPassword($this->auth->user()->password),
			'password' => v::notEmpty(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.password.change'));
		}

		$this->auth->user()->setPassword($request->getParam('password'));

		$this->flash->addMessage('info', 'Password has been changed');
		return $response->withRedirect($this->router->pathFor('home'));
	}
}
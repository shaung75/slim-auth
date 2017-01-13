<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

/**
 * AuthController Class
 *
 * @author Shaun Gill
 */
class AuthController extends Controller
{
	/**
	 * Signs user out and redirects to homepage
	 */
	public function getSignOut($request, $response)
	{
		$this->auth->logout();

		return $this->response->withRedirect($this->router->pathFor('home'));
	}

	/**
	 * Displays sign in page
	 */
	public function getSignIn($request, $response)
	{
		return $this->view->render($response, 'auth/signin.twig');
	}

	/**
	 * Attempts sign in, returns to sign in page if fails
	 * or logs in is successful
	 */
	public function postSignIn($request, $response)
	{
		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if(!$auth) {
			$this->flash->addMessage('error', 'Could not sign you in with those details');
			return $response->withRedirect($this->router->pathFor('auth.signin'));
		}

		return $response->withRedirect($this->router->pathFor('home'));
	}

	/**
	 * Displays sign up page
	 */
	public function getSignUp($request, $response)
	{
		return $this->view->render($response, 'auth/signup.twig');
	}	

	/**
	 * Attempts to create new user, redirects to signup page if fails,
	 * creates new user and redirects to home if successful
	 */
	public function postSignUp($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'name' => v::notEmpty()->alpha(),
			'password' => v::notEmpty(),
		]);

		if($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}

		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
		]);

		$this->flash->addMessage('info', 'You have been signed up');

		$this->auth->attempt($user->email, $request->getParam('password'));

		return $response->withRedirect($this->router->pathFor('home'));
	}
}

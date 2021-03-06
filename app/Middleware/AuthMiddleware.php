<?php

namespace App\Middleware;

/**
 * AuthMiddleware Class
 *
 * Redirects User to sign in page if not logged in
 * @author Shaun Gill
 */
class AuthMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if (!$this->container->auth->check()) {
			$this->container->flash->addMessage('error', 'Please sign in before doing that.');
			return $response->withRedirect($this->container->router->pathFor('auth.signin'));
		}

		$response = $next($request, $response);
		return $response;
	}
}
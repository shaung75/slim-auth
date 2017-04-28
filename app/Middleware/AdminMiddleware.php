<?php

namespace App\Middleware;

/**
 * AuthMiddleware Class
 *
 * Redirects User to sign in page if not logged in
 * @author Shaun Gill
 */
class AdminMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if (!$this->container->auth->check_admin()) {
			$this->container->flash->addMessage('error', 'You need to be an administrator to view that page.');
			return $response->withRedirect($this->container->router->pathFor('home'));
		}

		$response = $next($request, $response);
		return $response;
	}
}
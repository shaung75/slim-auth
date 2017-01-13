<?php

namespace App\Middleware;

/**
 * GuestMiddleware Class
 *
 * Redirects user to home if logged in
 * 
 * @author Shaun Gill
 */
class GuestMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		if ($this->container->auth->check()) {
			return $response->withRedirect($this->container->router->pathFor('home'));
		}

		$response = $next($request, $response);
		return $response;
	}
}
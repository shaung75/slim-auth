<?php

namespace App\Middleware;

/**
 * OldInputMiddleware Class
 *
 * Enables old form data to be stored for prepopulation
 *
 * @author Shaun Gill
 */
class OldInputMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		$this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
		$_SESSION['old'] = $request->getParams();

		$response = $next($request, $response);
		return $response;
	}
}
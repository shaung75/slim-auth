<?php
/**
 * Available Routes
 *
 * @author Shaun Gill
 * @since 0.0.1
 */
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

/**
 * Publicly accessable routes
 */
$app->get('/', 'HomeController:index')->setName('home');

/**
 * Guest only routes
 */
$app->group('', function(){
	$this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
	$this->post('/auth/signup', 'AuthController:postSignUp');

	$this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
	$this->post('/auth/signin', 'AuthController:postSignIn');
})->add(new GuestMiddleware($container));

/**
 * Authenticated only routes
 */
$app->group('', function() {
	$this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

	$this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
	$this->post('/auth/password/change', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));
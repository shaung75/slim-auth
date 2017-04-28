<?php
/**
 * Available Routes
 *
 * @author Shaun Gill
 * @since 0.0.1
 */
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Middleware\AdminMiddleware;

/**
 * Publicly accessable routes
 */
$app->get('/', 'HomeController:index')->setName('home');

/**
 * Guest only routes
 */
$app->group('', function(){
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

/**
 * Admin only routes
 */
$app->group('', function() {
	$this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
	$this->post('/auth/signup', 'AuthController:postSignUp');

	$this->get('/admin/new-user', 'AuthController:getCreateUser')->setName('admin.newUser');
	$this->post('/admin/new-user', 'AuthController:postCreateUser');

	$this->get('/admin', 'AdminController:index')->setName('admin.home');
})->add(new AdminMiddleware($container));
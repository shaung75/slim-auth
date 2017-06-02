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

	$this->get('/scheme/add', 'SchemeController:index')->setName('scheme.add');
	$this->post('/scheme/add', 'SchemeController:addScheme');

	$this->get('/scheme', 'SchemeController:listAll')->setName('scheme.all');

	$this->get('/scheme/{id}', 'SchemeController:view')->setName('scheme.view');

	$this->get('/scheme/{id}/edit', 'SchemeController:edit')->setName('scheme.edit');
	$this->put('/scheme/{id}/edit', 'SchemeController:updateScheme');

	$this->get('/test', 'TestController:index')->setName('test');
	$this->post('/test', 'TestController:newScheme');
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
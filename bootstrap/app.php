<?php

use Respect\Validation\Validator as v;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true, 'addContentLengthHeader' => false,
		'db' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'database' => 'll-db',
			'username' => 'root',
			'password' => 'wildlife7238',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		]
	],
]);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function($container) use ($capsule) {
	return $capsule;
};

$container['auth'] = function($container) {
	return new \App\Auth\Auth;
};

$container['trust'] = function($container) {
	return new \App\Models\Trust;
};

$container['species'] = function($container) {
	return new \App\Models\Species;
};

$container['habitats'] = function($container) {
	return new \App\Models\Habitat;
};

$container['habitatcats'] = function($container) {
	return new \App\Models\Habitatcat;
};

$container['partners'] = function($container) {
	return new \App\Models\Partner;
};

$container['partnercats'] = function($container) {
	return new \App\Models\Partnercat;
};

$container['fundingpartners'] = function($container) {
	return new \App\Models\FundingPartner;
};

$container['fundingpartnercats'] = function($container) {
	return new \App\Models\FundingPartnerCat;
};

$container['flash'] = function($container) {
	return new \Slim\Flash\Messages;
};

$container['view'] = function($container) {
	$view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
		'cache' => false,
		'debug' => true,
	]);

	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));

	$view->getEnvironment()->addGlobal('auth', [
		'check' => $container->auth->check(),
		'check_admin' => $container->auth->check_admin(),
		'user' => $container->auth->user() 
	]);

	$view->getEnvironment()->addGlobal('trust', [
		'all' => $container->trust->all()
	]);

	$view->getEnvironment()->addGlobal('habitats', [
		'all' => $container->habitats->with('category')->get()
	]);

	$view->getEnvironment()->addGlobal('habitatcats', [
		'all' => $container->habitatcats->all()
	]);


	$view->getEnvironment()->addGlobal('partnerss', [
		'all' => $container->partners->with('category')->get()
	]);

	$view->getEnvironment()->addGlobal('partnercats', [
		'all' => $container->partnercats->all()
	]);

	$view->getEnvironment()->addGlobal('fundingpartners', [
		'all' => $container->fundingpartners->with('category')->get()
	]);

	$view->getEnvironment()->addGlobal('fundingpartnercats', [
		'all' => $container->fundingpartnercats->all()
	]);


	$view->getEnvironment()->addGlobal('species', [
		'all' => $container->species->orderBy('species', 'ASC')->get()
	]);

	$view->getEnvironment()->addGlobal('flash', $container->flash);

	return $view;
};

$container['validator'] = function() {
	return new App\Validation\Validator;
};

$container['AdminController'] = function($container) {
	return new \App\Controllers\AdminController($container);
};

$container['HomeController'] = function($container) {
	return new \App\Controllers\HomeController($container);
};

$container['AuthController'] = function($container) {
	return new \App\Controllers\Auth\AuthController($container);
};

$container['PasswordController'] = function($container) {
	return new \App\Controllers\Auth\PasswordController($container);
};

$container['TestController'] = function($container) {
	return new \App\Controllers\TestController($container);
};

$container['SchemeController'] = function($container) {
	return new \App\Controllers\SchemeController($container);
};

$container['csrf'] = function($container) {
	return new \Slim\Csrf\Guard;
};

$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));

$app->add($container->csrf);

v::with('App\\Validation\\Rules\\');

require __DIR__ . '/../app/routes.php';
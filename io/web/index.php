<?php


use Firestark\Http\Router;
use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Relay\Relay;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../tools/helpers.php';

$app = new Firestark\App;
$app->instance('app', $app);
$app->instance('router', new Router);
$app->instance('response', new Firestark\Http\Response(Laminas\Diactoros\Response\HtmlResponse::class));
$app->instance('status', new Firestark\Status);
$app->instance('sess', new Firestark\Session);
$app->instance('view', new Firestark\View($app['response'], new Blade(__DIR__ . '/views', __DIR__ . '/storage/cache/blade')));

Facade::setFacadeApplication($app);

including(__DIR__ . '/../../bindings');
including(__DIR__ . '/bindings');
including(__DIR__ . '/routes');
including(__DIR__ . '/statuses');
including(__DIR__ . '/../../app/procedures');


$app->instance('request', Laminas\Diactoros\ServerRequestFactory::fromGlobals());

$relay = new Relay([
    new \Firestark\Middlewares\Redirect($app),
    new \Firestark\Middlewares\Input($app),
    new \Firestark\Middlewares\Auth($app),
    new \Firestark\Middlewares\RequestHandler($app['router'], $app['status']),
]);
    
$response = $relay->handle($app['request']);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

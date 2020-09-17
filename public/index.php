<?php declare(strict_types=1);

use App\Services\Http\Router;
use App\Services\Http\Request;
use App\Controllers\HomeController;
use App\Services\View\View;

require dirname(__DIR__).'/config/bootstrap.php';

$router = new Router(new Request());

$router->get('/', function() {
    $contoller = new HomeController(
        new View( dirname(__DIR__).'/src/Templates' )
    );
    return $contoller->render( 'home');
});

//
//$router->get('/api/v1/data', function() {
//    $db = DBFactory::create(
//        new CSV(dirname(__DIR__).'/data/export.csv')
//    );
//
//    $aggregator = new OnBoardingFlow($db->export());
//    return JSONTransformer::fromArray($aggregator->aggregate());
//});
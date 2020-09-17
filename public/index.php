<?php declare(strict_types=1);

use App\Service\Http\Router;
use App\Service\Http\Request;

require dirname(__DIR__).'/config/bootstrap.php';

//$router = new Router(new Request());
//
//$router->get('/', function() {
//    $tpl = new View( dirname(__DIR__).'/src/Template' );
//
//    return $tpl->render( 'home');
//});
//
//$router->get('/api/v1/data', function() {
//    $db = DBFactory::create(
//        new CSV(dirname(__DIR__).'/data/export.csv')
//    );
//
//    $aggregator = new OnBoardingFlow($db->export());
//    return JSONTransformer::fromArray($aggregator->aggregate());
//});
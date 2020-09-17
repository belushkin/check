<?php declare(strict_types=1);

use App\Controllers\LoginController;
use App\Services\Http\Router;
use App\Services\Http\Request;
use App\Controllers\HomeController;
use App\Services\View\View;
use App\Services\PDO\PDOImpl;
use App\DAO\UsersDAO;
use App\DAO\ArticlesDAO;
use App\Services\Auth\AuthenticationService;

require dirname(__DIR__).'/config/bootstrap.php';

$request = new Request();
$router = new Router($request);
$pdo = PDOImpl::getPDO();
$usersDAO = new UsersDAO($pdo);
$articlesDAO = new ArticlesDAO($pdo);
$auth = new AuthenticationService($usersDAO);

$router->get('/', function() use ($usersDAO, $articlesDAO, $auth) {
    $controller = new HomeController(
        new View( dirname(__DIR__).'/src/Templates' ),
        $auth,
        $usersDAO,
        $articlesDAO
    );
    return $controller
        ->indexAction();
});

$router->post('/login', function() use ($usersDAO, $auth, $request) {
    $controller = new LoginController(
        new View( dirname(__DIR__).'/src/Templates' ),
        $auth,
        $request,
        $usersDAO
    );
    return $controller
        ->indexAction();
});

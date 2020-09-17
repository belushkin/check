<?php declare(strict_types=1);

use App\Services\Http\Router;
use App\Services\Http\Request;
use App\Controllers\HomeController;
use App\Services\View\View;
use App\Services\PDO\PDOImpl;
use App\DAO\UsersDAO;
use App\DAO\ArticlesDAO;

require dirname(__DIR__).'/config/bootstrap.php';

$router = new Router(new Request());
$pdo = PDOImpl::getPDO();
$usersDAO = new UsersDAO($pdo);
$articlesDAO = new ArticlesDAO($pdo);

$router->get('/', function() use ($usersDAO, $articlesDAO) {
    $contoller = new HomeController(
        new View( dirname(__DIR__).'/src/Templates' ),
        $usersDAO,
        $articlesDAO
    );
    return $contoller
        ->indexAction();
});

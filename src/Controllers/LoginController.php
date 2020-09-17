<?php

namespace App\Controllers;

use App\DAO\IDAO;
use App\Models\Article;
use App\Models\User;
use App\Services\Auth\AuthenticationService;
use App\Services\Http\Request;
use App\Services\View\View;
use App\DTO\ArticlesDTO;

class LoginController extends ActionController {

    private $template = 'home';

    private $usersDAO;
    private $auth;
    private $request;

    public function __construct(View $view, AuthenticationService $auth, Request $request, IDAO ...$dao)
    {
        parent::__construct($view);

        $this->auth = $auth;
        $this->request = $request;
        $this->usersDAO = $dao[0];
    }

    public function indexAction()
    {
        $this->auth->authenticate($this->request);
        header("Location: /");
    }

}

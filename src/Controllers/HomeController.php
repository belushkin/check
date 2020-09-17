<?php

namespace App\Controllers;

use App\DAO\IDAO;
use App\Models\Article;
use App\Models\User;
use App\Services\Auth\AuthenticationService;
use App\Services\View\View;
use App\DTO\ArticlesDTO;

class HomeController extends ActionController {

    private $template = 'home';

    private $usersDAO;
    private $articlesDAO;
    private $auth;

    public function __construct(View $view, AuthenticationService $auth, IDAO ...$dao)
    {
        parent::__construct($view);

        $this->auth = $auth;
        $this->usersDAO = $dao[0];
        $this->articlesDAO = $dao[1];
    }

    public function indexAction()
    {
        $articleModel = Article::fromObject($this->articlesDAO->findById(1));
        $articleDto = ArticlesDTO::convertToDto($articleModel);

        return $this->render(
            $this->template,
            [
                'top_post' => $articleDto,
                'user' => ($this->auth->isLoggedIn()) ? $this->auth->getAuthenticatedUser() : null
            ]
        );
    }

}

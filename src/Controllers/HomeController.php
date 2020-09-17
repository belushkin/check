<?php

namespace App\Controllers;

use App\DAO\IDAO;
use App\Models\Article;
use App\Models\User;
use App\Services\View\View;

class HomeController extends ActionController {

    private $template = 'home';

    private $usersDAO;
    private $articlesDAO;

    private $user;
    private $article;

    public function __construct(View $view, IDAO ...$dao)
    {
        parent::__construct($view);

        $this->usersDAO = $dao[0];
        $this->articlesDAO = $dao[1];
    }

    public function indexAction() {

//        /** @var Stock $a */
//        echo "<pre>";
        $this->user = User::fromObject($this->usersDAO->findById(1));
        $this->article = Article::fromObject($this->articlesDAO->findById(1));

//        print_r($user);
//        print_r($article);
//        print_r(getenv('DB_NAME'));

        return $this->render(
            $this->template,
            ['nasos' => 'parsos']
        );
    }

}

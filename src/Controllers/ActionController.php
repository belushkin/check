<?php

namespace App\Controllers;

use App\DAO\IDAO;
use App\Services\View\View;

class ActionController {

    protected $view;
    protected $dao;

    public function __construct(View $view, IDAO $dao)
    {
        $this->view = $view;
        $this->dao = $dao;
    }

    public function render(string $template) {
        return $this->view->render( $template);
    }

}

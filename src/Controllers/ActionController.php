<?php

namespace App\Controllers;

use App\DAO\IDAO;
use App\Services\View\View;

class ActionController {

    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function render(string $template, $variables = array()) {
        return $this->view->render( $template, $variables);
    }

}

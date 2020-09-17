<?php

namespace App\Controllers;

use App\Services\View\View;

class ActionController {

    private $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function render(string $template) {
        return $this->view->render( $template);
    }

}

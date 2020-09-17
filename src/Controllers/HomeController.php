<?php

namespace App\Controllers;

use App\DAO\DAO;
use App\DAO\UsersDAO;

class HomeController extends ActionController {

    public function indexAction() {

        echo "<pre>";
        print_r($this->dao);
        print_r(getenv('DB_NAME'));

        return $this;
    }

}

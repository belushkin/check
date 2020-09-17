<?php

namespace App\Controllers;

use App\DAO\DAO;
use App\DAO\UsersDAO;
use App\Models\User;

class HomeController extends ActionController {

    public function indexAction() {

//        /** @var Stock $a */
        echo "<pre>";
        $user = User::fromObject($this->dao->findById(1));
        print_r($user);
        print_r(getenv('DB_NAME'));

        return $this;
    }

}

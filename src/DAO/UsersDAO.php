<?php

namespace App\DAO;

class UsersDAO implements IDAO {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById() {

    }
}
<?php

namespace App\DAO;

class ArticlesDAO implements IDAO {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $id) {
        $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject();
    }

}
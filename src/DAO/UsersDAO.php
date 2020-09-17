<?php

namespace App\DAO;

class UsersDAO implements IDAO {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject();
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchObject();
    }

    public function findByEmailAndPassword($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email AND password=MD5(:password)");
        $stmt->execute(['email' => $email, 'password' => $password]);
        return $stmt->fetchObject();
    }

}
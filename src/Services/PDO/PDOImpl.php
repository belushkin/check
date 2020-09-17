<?php

namespace App\Services\PDO;

use PDO;

class PDOImpl {

    private static $pdo = null;

    private function __construct()
    {
    }

    public static function getPDO()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO('mysql:host='.getenv('DB_SERVER').';port=3306;dbname='.
                getenv('DB_NAME'),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD')
            );
        }
        return self::$pdo;
    }

}


<?php

namespace Coolblue\Interview\Core;

use PDO;
use PDOException;

class DatabaseConnection
{
    /** @var PDO */
    public PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=" . $_ENV['DATABASE_HOST'] . ";dbname=" . $_ENV['DATABASE_NAME'] . "",
                $_ENV['DATABASE_USERNAME'],
                $_ENV['DATABASE_PASSWORD']
            );
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
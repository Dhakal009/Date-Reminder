<?php
namespace Acer\Remindate;

use Exception;
use PDO;

class Database{
    public function getConnection(): PDO {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3306;dbname=remindate", "root", "bdbro321@");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(Exception $e) {
            dump(vars: $e);
            die();
        }
    }

    public function query($sql,$data = []): bool
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare($sql);

        return $stmt->execute($data);
        
    }
}
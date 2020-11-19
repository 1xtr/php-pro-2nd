<?php

namespace app\services;

use app\traits\SingletonTrait;

require CONFIG_DIR . "site-config.php";

class Db
{
    use SingletonTrait;

    private ?object $conn = null;

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->buildConnectionString(),
                DB_USER,
                DB_PASSWORD,
            );
            $this->conn->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC,
            );
        }
        return $this->conn;
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function getLastId(): int
    {
        return $this->getConnection()->lastInsertId();
    }

    public function queryAll(string $sql, array $params = [], string $className = null)
    {
        $pdoStatement = $this->query($sql, $params);
        if (isset($className)) {
            $pdoStatement->setFetchMode(
                \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
                $className
            );
        }
        return $pdoStatement->fetchAll();
    }

    public function queryOne(string $sql, array $params = [], string $className = null)
    {
        return $this->queryAll($sql, $className, $params)[0];
    }

    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    private function buildConnectionString()
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            DB_DRIVER,
            DB_HOST,
            DB_NAME,
            DB_CHARSET,
        );
    }
}
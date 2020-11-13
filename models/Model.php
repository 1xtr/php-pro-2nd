<?php


namespace app\models;

use app\services\Db;
use app\interfaces\ModelInterface;

abstract class Model implements ModelInterface
{
    protected string $tableName;
    protected ?object $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): ModelInterface
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryObject($sql, get_called_class(), [':id' => $id])[0];
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryObject($sql, get_called_class());
    }

    abstract public function getTableName(): string;
}
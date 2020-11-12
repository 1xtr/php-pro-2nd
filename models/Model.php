<?php


namespace models;

use services\Db;
use interfaces\ModelInterface;

abstract class Model implements ModelInterface
{
    protected string $tableName;
    protected ?object $db = null;

    public function __construct()
    {
        $this->db = new Db();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): array
    {
        $sql = "SELECT * from {$this->tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName(): string;
}
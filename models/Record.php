<?php


namespace app\models;

use app\services\Db;
use app\interfaces\ModelInterface;

abstract class Record implements ModelInterface
{
    protected string $tableName;
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public static function getById(int $id): ModelInterface
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return static::getQuery($sql, [':id' => $id])[0];
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getQuery($sql, []);
    }

    public function deleteByID(int $id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

    abstract public static function getTableName(): string;

    protected static function getQuery($sql, $params = [])
    {
        return Db::getInstance()->queryAll($sql, $params, get_called_class());
    }
}
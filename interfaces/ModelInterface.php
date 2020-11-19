<?php


namespace app\interfaces;


interface ModelInterface
{
    static function getById(int $id): ModelInterface;

    static function getAll();

    static function getTableName(): string;

}
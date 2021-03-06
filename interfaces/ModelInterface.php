<?php


namespace app\interfaces;


interface ModelInterface
{
    public function getById(int $id): ModelInterface;

    public function getAll();

    public function getTableName(): string;

}
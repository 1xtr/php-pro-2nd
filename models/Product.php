<?php


namespace models;


class Product extends Model
{
    protected int $id;
    protected string $name;
    protected int $categoryId;
    protected string $description;
    protected int $price;

    public function getTableName(): string
    {
        return 'products';
    }
}
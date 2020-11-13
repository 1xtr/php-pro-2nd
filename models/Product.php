<?php


namespace app\models;


class Product extends Model
{
    protected int $id;
    protected string $name;
    protected string $full_desc;
    protected int $price;
    protected int $image_id;
    protected int $section_id;
    protected int $views_count;
    protected int $quantity;

    public function getTableName(): string
    {
        return 'products';
    }
}
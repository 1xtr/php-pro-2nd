<?php


namespace app\models;


class Orders extends Model
{
    protected int $id;
    protected int $user_id;
    protected $date;
    protected int $status_id;
    protected int $totalAmount;

    public function getTableName(): string
    {
        return "orders";
    }
}
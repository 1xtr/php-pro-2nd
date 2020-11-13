<?php


namespace app\models;


class Orders extends Model
{
    protected int $id;
    protected int $user_id;
    protected  $date;
    protected int $status_id;
    protected int $order_amount;

    public function create(int $user_id)
    {

    }

    public function getTableName(): string
    {
        return "orders";
    }
}
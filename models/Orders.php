<?php


namespace models;


class Orders extends Model
{
    protected $id;
    protected $user_id;
    protected $date;
    protected $status_id;
    protected $totalAmount;

    public function getTableName(): string
    {
        return "orders";
    }
}
<?php


namespace app\models;


class User extends Model
{
    protected int $id;
    protected string $login;
    protected string $password;
    protected string $email;

    public function getTableName(): string
    {
        return "users";
    }
}
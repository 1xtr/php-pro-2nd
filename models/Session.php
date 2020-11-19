<?php


namespace app\models;


use app\traits\SingletonTrait;

class Session
{
    use SingletonTrait;

    public static function addField(string $name, string $value)
    {
        $_SESSION[$name] = $value;
    }

}
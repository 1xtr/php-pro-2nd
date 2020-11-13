<?php


namespace app\traits;


trait SingletonTrait
{
    /**
     * @var null|static
     */
    static $instance = null;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function __construct() {}

    public function __wakeup() {}

    public function __clone() {}


}